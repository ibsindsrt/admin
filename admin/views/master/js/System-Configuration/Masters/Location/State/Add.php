<?php
$this->minify->js(array('js/Fiveinone.min.js','js/System-Configuration/Masters/Location/State/Add.js'));
echo $this->minify->deploy_js(False);
?>