<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>留言板</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="warning">
    <strong>注意!本站為測試用</strong>
  </header>
  <main class="board">
    <h1 class="board_title">Comments</h1>
    <form class="board_new-comment-form" >
      <textarea name="content" rows="5"></textarea>
      <input class="board_submit_btn" type="submit">
    </form>
    <div class="board_hr"></div>
    <section>      
    </section>
  </main>
  <script>
      var request = new XMLHttpRequest();
      request.open('GET', 'api_comment.php', true);
      request.onload = function() {
        if (this.status >= 200 && this.status < 400) 
        {
          var resp =this.response;
          var json = JSON.parse(resp);
          var comments = json.comments
          for(var i=0; i<comments.length;i++){
            var comment = comments[i];
            var div = document.createElement('div')
            div.classList.add('card')
            div.innerHTML = `
            <div class="card_avatar"></div>
            <div class="card_body">
              <div class="card_info">
                <span class="card_author">
                ${comment.nickname}(@${comment.username})
                </span>
                <span class="card_time">
                  ${comment.created_at}
                </span>
              </div>
              <div class="card_content">
                <p>${encodeHTML(comment.content)}</p>
              </div>
            </div>
            `
            document.querySelector('section').
              appendChild(div)
          }
        } 
      };
      request.send();
      var form = document.querySelector(
        '.board_new-comment-form')

        
      form.addEventListener('submit',function(e) {
        e.preventDefault();
        var content = document.querySelector('textarea[name=content]').value
        var request = new XMLHttpRequest();
        request.open('POST', 'api_add_comment.php', true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        request.send("username=aaa&content=" + encodeURIComponent(content))
        request.onload = function() {
        if (this.status >= 200 && this.status < 400) 
        {
          var resp =this.response;
          var json = JSON.parse(resp)
          if(json.ok){
            location.reload()
          }
          else{
            alert(json.message)
          }
          
        }
      }
    })
    function encodeHTML(s) {
    return s.replace(/&/g, '&amp;').
    replace(/</g, '&lt;').replace(/"/g, '&quot;');
}
  </script>
</body>
</html>