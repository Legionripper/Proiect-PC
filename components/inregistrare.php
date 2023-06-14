<script src="js/validateInregistrare.js"></script>
<script src="js/jquery.js"></script>

<div class="container-login100">
   <div class="wrap-login100">
    <span class="login100-form-title">
    Inregistreaza-te
    </span>
      <form class="login100-form validate-form" action="phpForms/inregistrare_post.php" method="post" onsubmit="return validateForm();">
         <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="Nume" placeholder="Nume" id="nume">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
         </div>
         <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="prenume" placeholder="Prenume" id="prenume">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
         </div>

         <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="Email" placeholder="Email" id="email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
         </div>

         <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="ConfirmaEmail" placeholder="Confirma email" id="confirmaemail">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
         </div>

         <div class="wrap-input100 validate-input" >
            <input class="input100" type="password" name="Parola" placeholder="Parola" id="parola">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
         </div>
         <div class="wrap-input100 validate-input" >
            <input class="input100" type="password" name="Confirmare parola" placeholder="Confirmare parola" id="confirmaparola">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
         </div>
         <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="adresa" placeholder="Adresa" id="adresa">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
         </div>
         <div class="wrap-input100 validate-input" >
            <input class="input100" type="text" name="varsta" placeholder="Varsta" id="varsta">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
         </div>
         <span></span>
         <div class="container-login100-form-btn">
             <button class="login100-form-btn" type="submit">
             Inregistreaza-te
             </button>
          </div>

        </form>

   </div>
</div>