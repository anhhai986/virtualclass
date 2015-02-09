<head>
<?php

// This file is part of Vidyamantra - http:www.vidyamantra.com/

/**@Copyright 2014  Vidyamantra Edusystems. Pvt.Ltd.
 * @author  Suman Bogati <http://www.vidyamantra.com>
  */

include('auth.php');

//the www path for virtualclass
$whiteboardpath = "https://local.vidya.io/virtualclass/";

?>

<link rel="stylesheet" type="text/css" href="../css/styles.css">
<link rel="stylesheet" type="text/css" href= <?php echo $whiteboardpath."css/styles.css" ?> />
<link rel="stylesheet" type="text/css" href= <?php echo $whiteboardpath."bundle/jquery/css/base/jquery-ui.css" ?> />
<link rel="stylesheet" type="text/css" href= <?php echo $whiteboardpath."css/jquery.ui.chatbox.css" ?> />
<link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/ijhofagnokdeoghaohcekchijfeffbjl">


<?php
include('js.debug.php');

//include('js.php');

// this url should be soemthing like this
// https://local.vidya.io/virtualclass/example/index.php?id=103&r=t&name=moh&room=1422#
    
if(isset($_GET['id'])){
    $uid = $_GET['id'];
    $sid = $uid;
}else{
    $uid = 100;
    $sid = 100;
}

//$r = (isset($_GET['r'])) ? $_GET['r'] : 's';

if(isset($_GET['r'])){
    $r = $_GET['r'];
    $cont_class = $r == 't' ? "teacher" : 'student';
}else{
    $r = 's';
    $cont_class = 'student';
}

$room = (isset($_GET['room'])) ? $_GET['room'] : '215';
//echo $room;

if(isset($_GET['name'])){
    $uname = $_GET['name'];
    $fname = $uname;
    $lname = $uname + ' lastname';
}else{
    $uname = 'My name';
    $fname = $uname;
    $lname = $uname + ' lastname';
}

?>
<script type="text/javascript">	
    if (!!window.Worker) {
        var sworker = new Worker("<?php echo $whiteboardpath."src/screenworker.js" ?>");
    }
   
	<?php echo "wbUser.name='$uname';"; ?>
	<?php echo "wbUser.id='".$uid."';"; ?>
	<?php echo "wbUser.socketOn='0';"; ?>
	<?php echo "wbUser.dataInfo='0';"; ?>
	<?php echo "wbUser.room='".$room."';"; ?>
	<?php echo "wbUser.sid='".$sid."';"; ?>
	<?php echo "wbUser.role='".$r."';"; ?>
	<?php echo "wbUser.fname='".$fname."';"; ?>
    <?php echo "wbUser.lname='".$lname."';"; ?>
	window.io = io;
    window.whiteboardPath =  'https://local.vidya.io/virtualclass/';
    wbUser.imageurl = window.whiteboardPath + "images/quality-support.png"
</script>

</head>


<div id="vAppCont" class="<?php echo $cont_class; ?>">
    <div id="vAppWhiteboard" class="vmApp">

       <div id="vcanvas" class="socketon">

        <div id="containerWb">

        </div>


        <div id="mainContainer">

          <div id="packetContainer">

          </div>

          <div id="informationCont">

          </div>
        </div>

        <div class="clear"></div>
      </div>

    </div>


<div id="audioWidget">
    <?php 
    if($r == 's'){
        $dap = "false";
        $classes = "audioTool deactive";
    ?>
        
        
<?php }else{
          $classes = "audioTool active";
          $dap = "true";
      }?>
    
    <div id="mainAudioPanel">
        <div id="alwaysPress">
              <div class="<?php echo $classes; ?>" id="speakerPressing">
                <a data-title="Press always to speak" class="tooltip" id="speakerPressingAnch"
                name="speakerPressingAnch">Push To Talk</a>
              </div>
        </div>

        <div id="speakerPressOnce" class="<?php echo $classes; ?>" data-audio-playing="<?php echo $dap;?>">
          <a id="speakerPressonceAnch" class="tooltip" data-title="Press once to speak" name=
          "speakerPressonceAnch"><img id="speakerPressonceImg" src=
          "https://local.vidya.io/virtualclass/images/speakerpressonce.png" /></a>
        </div>
    </div>
    
    <div class="audioTool" id="silenceDetect" data-silence-detect="stop">
        sd
    </div>
    
    <div class="audioTool" id="audioTest">
      <a data-title="Audio Testing" class="tooltip" id="audiotestAnch" name=
      "audiotestAnch"><img src=
      "https://local.vidya.io/virtualclass/images/audiotest.png"
      id="audiotestImg" /></a>
    </div>

    
    
    
</div>

<div id="chatWidget"> 
    <div id = "stickycontainer"> </div>
</div>   
    
</div>
