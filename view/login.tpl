{if $LOGADO == TRUE}



{else}

<section class="row" id="fazerlogin">

    <form name="cliente_login" method="post" action="" >
    
        <div class="col-md-4 text-center">
                        
                
        </div>
     
        <!---  aqui estão os campos -->
        <div class="col-md-4">

     
            <div class="form-group"> 
                <label></i> Agency: </label>
                <input type="text"  class="form-control " name="txt_agency" value="" placeholder="Enter your agency..." required autocomplete="off">        

            </div>

             <div class="form-group"> 
                 <label> Account Number: </label>
                 <input type="text"  class="form-control " name="txt_account" value="" placeholder="Enter your account number..." required>        
           
            </div>



            <div class="form-group"> 
                 <label> Password: </label>
                 <input type="password"  class="form-control " name="txt_password" value="" placeholder="Enter your password..." required>        
           
            </div>


            <div class="form-group"> 
                
                <button class="btn btn-geral btn-block btn-lg"><i class="glyphicon glyphicon-log-in"></i> Login </button>
          
                
                
                
            </div>
            <div class="form-group text-center"> 
                <a href="{$PAG_CADASTRO}" class="btn btn-default "><i class="glyphicon glyphicon-pencil"></i> Create new account</a>            
            </div>

            
        </div><!-- fim dos campos -->


        <div class="col-md-4 text-center"> 
        
      
        </div>
    
    </form>
    
    
</section>

{/if}