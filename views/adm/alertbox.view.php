<?php 
          if(isset($_GET['confirm']) && isset($_GET['msg'])) {
            if($_GET['confirm'] == '1')
              echo HTML::mesageDefaultAdm(base64_decode($_GET['msg']), 'alert-success');
            if($_GET['confirm'] == '2')
              echo HTML::mesageDefaultAdm(base64_decode($_GET['msg']), 'alert-danger');
          } 
          ?>