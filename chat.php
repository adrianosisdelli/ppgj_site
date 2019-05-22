
    <?php 
    function loginForm(){  
        echo' 
        <div id="loginform"> 
            <form action="index.php" method="post">  
                <label for="nome">Name: 
                <input type="text" name="nome" id="nome" /> 
                <input type="submit" name="entrar" id="entrar" value="Entrar" /> 
            </form> 
        </div> 
        ';  
    }

    if(isset($_ POST['entrar'])){  
        if($_ POST['nome'] != ""){  
            $_ SESSION['nome'] = stripslashes(htmlspecialchars($_ POST['nome']));
            
            $fp = f open("log.html", 'a');  // "a" abrir para ler e escrever
            f write($fp, "<div class='msgln'><i>". $_ SESSION['nome'] ." entrou do chat.</i><br></div>");  
            f close($fp);
        }  
        else{  
            echo '<span class="error">Escolha um nome, antes de entrar!</span>';  
        }  
    }

    if(isset($_ GET['sair'])){ 
        $fp = f open("log.html", 'a');  // "a" abrir para ler e escrever
        f write($fp, "<div class='msgln'><i>". $_ SESSION['nome'] ." saiu do chat.</i><br></div>");  
        f close($fp);  

        session_destroy();  
        header("Location: index.php");
    }
?






<h4 class="botaochat text-center text-danger">
      <span class="fa-stack fa-lg">
         <i class="fa fa-circle fa-stack-2x"></i>
         <i class="fa fa-comments-o fa-stack-1x fa-inverse"></i>
      </span>
    </h4>
    
    <div id="wrapper">  
        <div id="menu">  
            <p class="welcome">Bem-vindo <b></b> | <a class="logout" id="sair" href="#">Sair</a></p>  
            <div style="clear:both"></div>  
        </div>      
        <div id="chatbox">
            
        </div>  

        <form name="message" action="">  
            <input name="usermsg" type="text" id="usermsg" size="63" />  
            <input name="submitmsg" type="submit"  id="submitmsg" value="Enviar!" />  
        </form>  
    </div>
<!--



<!-- botaochat -->
    <script>
    $(document).ready(function(){
      $(.botaochat).click(function(){
        $()
      })

    });
    </script>
<!-- FIM botaochat -->


// jQuery Document
<script> 
$(document).ready(function(){
    $("#sair").click(function(){  
        var sair = confirm("Tem a certeza que quer sair?");  
        if(sair==true){window.location = 'index.php?sair=true';}        
    });

    $("#submitmsg").click(function(){     
        var clientmsg = $("#usermsg").val();  
        $.post("post.php", {text: clientmsg});                
        $("#usermsg").attr("value", "");  
        return false;  
    });

    function loadLog(){
        var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
        $.ajax({  
            url: "log.html",  
            cache: false,  
            success: function(html){          
                $("#chatbox").html(html); //Insert chat log into the #chatbox div

                //Auto-scroll             
                var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request  
                if(newscrollHeight > oldscrollHeight){  
                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div  
                }
            }  
        });  
    }
    setInterval (loadLog, 2500);    //Reload file every 2500 ms or x ms if you wish to change the second parameter
});
<!-- -->





.botaochat {
    position: fixed;
    right: 20px;
    bottom: 20px;
    cursor: pointer;
}   

body {  
    font:12px arial;  
    color: #222;  
    text-align:center;  
    padding:35px; }  
   
form, p, span {  
    margin:0;  
    padding:0; }  
   
input { font:12px arial; }  
   
#wrapper, #loginform {  
    margin:0 auto;  
    padding-bottom:25px;  
    background:#EBF4FB;  
    width:50%;
    min-width: 155px;
    border:1px solid #ACD8F0; }  
   
#loginform { padding-top:25px; }  
   
    #loginform p { margin: 5px; }  
   
#chatbox {  
    text-align:left;  
    margin:0 auto;  
    margin-bottom:25px;  
    padding:10px;  
    background:#fff;  
    height:270px;  
    width:430px;  
    border:1px solid #ACD8F0;  
    overflow:auto; }  
   
#usermsg {  
    width:395px;  
    border:1px solid #ACD8F0; }  
   
#submit { width: 60px; }  
   
.error { color: #ff0000; }  
   
#menu { padding:12.5px 25px 12.5px 25px; }  
   
.welcome { float:left; }  
   
.logout { text-decoration: none; }  
.logout:hover { font-weight: bold; } 

.msgln { margin:0 0 2px 0; }

