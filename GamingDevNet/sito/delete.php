<?php
echo rmdir('games');

$files = glob('avatars/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

?>