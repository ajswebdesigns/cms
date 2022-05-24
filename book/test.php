<?php
// header('Location: practice7.php');
echo 'Hello';
?>


<script>
  for(let i = 0; i < 100; i++) {
    let btn = document.createElement('button');
    btn.addEventListener('click', (e)=>{
      alert('I have been clicked');
      console.log(e);
    })
    btn.innerText = 'hello';
    document.body.appendChild(btn);
  }


  window.localStorage.setItem('name', 'Andrew');
</script>