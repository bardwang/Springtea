<?php
setcookie("username", "", time()-3600);
setcookie("access", "", time()-3600);

printf("<script>location.href='login.php'</script>");
?>