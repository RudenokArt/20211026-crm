<?php 
function debugger($entity) { ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <style>
  .debugger_swich {
    cursor: pointer;
    position: fixed;
    top: 0;
    right: 0;
    font-size: 50px;
    z-index: 1000;
    background: royalblue;
    color: white;
    padding: 0;
    margin: 0;
    line-height: 1em;
    font-weight: bold;
    border: 1px solid red;
    padding: 10px;
  }
  .debugger{
    position: fixed;
    top: 0;
    width: 50vw;
    height: 100vh;
    right: 0;
    z-index: 999;
    background: transparent;
    border: 1px solid red;
    overflow: scroll;
  } 
  .debugger pre {
    background: rgba(0, 0, 0, 0.8);
    color: khaki;
    font-size: 16px;
  }
</style>
<div class="debugger_swich">+</div>
<div class="debugger">
  <pre>
    <?php print_r($entity);?>
  </pre>
</div>
<script>
  $('.debugger').slideUp();
  $('.debugger_swich').click(function () {
    $('.debugger').slideToggle();
  });
</script>
<?php } ?>