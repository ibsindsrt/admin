<?php
$this->minify->js(array('js/Fiveinone.min.js','js/System-Configuration/Masters/Services/MService/Add.js'));
echo $this->minify->deploy_js(False);
?>