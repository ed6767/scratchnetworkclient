catch(Exception $e) {
        /*+---------------------------------------+
          |                                       |
          |       ERROR MESSAGE                   |
          |                                       |
          +---------------------------------------+*/
    $errorcode = base64_encode($e->getMessage());
    // Not found message
  if( strpos( $e->getMessage(), "No such file or directory" ) !== false ) {
         echo '
                 <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
             <h2 class="mdl-card__title-text" style="align-self: flex-start;">Not found</h2>
             <div class="mdl-color-text--grey-600">
           The item you requested does not exist. It could\'ve been deleted.<br>
           <a href="#" onclick="loadlistings();">Click here</a> to return to the main page. 
           <!-- <font size=1>'. $errorcode  .' line '. $e->getLine() .'</font> -->
              </div>

              </div>

          </div>


    ';
    echo '<!-- End -->'; die();
}
    //Release error message
    /*
       echo '
                 <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
             <h2 class="mdl-card__title-text" style="align-self: flex-start;">Unhandled Server Error</h2>
             <div class="mdl-color-text--grey-600"><br>
             Sorry, we couldn\'t proccess your request because there was an internal server error.<br>
             It may be a problem with your session. Open the draw to the left of the page and click the down arrow next to your username and click "End Session".<br>
            Please contact <a href="//scratch.mit.edu/users/myed">@myed</a> on Scratch immedietly if this error still occurs after refreshing.
            <font size=1>'. $errorcode  .' line '. $e->getLine() .'</font>
              </div>

              </div>

          </div>


    ';
    */
        echo '
        <script>
        loadlistings();
        shownoticeDialog("Sorry, there was an error proccessing your request. It was in module '. explode("/", $e->getFile())[7] .' at line '. $e->getLine() .'. The error code is: '. $errorcode .'... Please send this message to @myed as text. Screenshots are scary.");
        </script>
                 <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
             <h2 class="mdl-card__title-text" style="align-self: flex-start;">Error Proccessing Request</h2>
             <div class="mdl-color-text--grey-600"><br>
             Please tell @myed - it is likely that this bug is being worked on right now so only do it if it lasts for more than an hour.
            <font size=1>'. $errorcode  .' line '. $e->getLine() .' module '.  explode("/", $e->getFile())[7] .'</font>
              </div>

              </div>

          </div>


    ';
    echo '<!-- End -->'; die();
}
