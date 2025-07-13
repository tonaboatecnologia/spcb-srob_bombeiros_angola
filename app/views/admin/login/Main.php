
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid" >
		<div class="row">
			
			<div class="col-sm-12" >
				<div class="login-card card-block" style="background-color: rgba(255, 255, 255, 0.88);">
					<div class="card-text">
					<?php
                                   // Exibir mensagens de erro armazenadas na variável de sessão
                                   /* if (isset($_SESSION['msgUsers']) && !empty($_SESSION['msgUsers'])) {
                                        foreach ($_SESSION['msgUsers'] as $error) {
											$_SESSION['msgUsers'] = "<div class='alert alert-danger text-center'>" . $error['message'] . "</div>";
                                        }
                        
                                    }*/
									  // Limpar mensagens de erro da sessão após exibição
									  if(isset($_SESSION['msgUsers'])){
										echo $_SESSION['msgUsers'];
										   unset($_SESSION['msgUsers']);
									   }
									?>
					</div>
				<?php global $userFormDatasLogin, $userSenhaLogin, $userEmailNipLogin; //var_dump($userFormDatasLogin, $userSenhaLogin, $userEmailNipLogin);
				
				?>

					<form name="userFormLogin" action="<?php echo DIRPAGE . 'login' ?>" method="post" class="md-float-material">
						<div class="text-center">
							<img src="<?php echo DIRADMINIMG.'logos/logospcb.jpeg'?>" width="75px" height="75px" alt="logotipo spcb System">
						</div>
						<h3 class="text-center txt-primary">
							
						 SROB | SPCB
						</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="text" name="userEmailNipLogin" value="<?php echo $userEmailNipLogin ;?>" id="userEmailNipLogin" class="md-form-control" required="required" maxlength="45"/>
									<label><i class="fa fa-indent"></i> NIP | EMAIL<i class="fa fa-id-card"></i></label>
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input type="password" name="userSenhaLogin" value="<?php echo $userSenhaLogin ;?>" id="userSenhaLogin" class="md-form-control" required="required" maxlength="45"/>
									<label><i class="fa fa-key"></i> SENHA <i class="fa fa-code-fork"></i></label>
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
							<div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
								<label class="input-checkbox checkbox-primary">
									<input type="checkbox" id="checkbox">
									<span class="checkbox"></span>
								</label>
								<div class="captions">Lembra-me!</div>

							</div>
								</div>
							<div class="col-sm-6 col-xs-12 forgot-phone text-right">
								<a href="" class="text-right f-w-600"> Esqueceu-se da Senha?</a>
								</div>
						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
							<button type="submit" name="submitUserLogin"  value="submitUserLogin" id="submitUserLogin" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Acessar <i class="fa fa-laptop"></i> Sistema </button>
							</div>
						</div>
						<!-- <div class="card-footer"> 
						<div class="col-sm-12 col-xs-12 text-center">
							<span class="text-muted">Não tenho Conta?</span>
							<a href="register2.html" class="f-w-600 p-l-5">Sign up Now</a>
						</div>-->

						<!-- </div> -->
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>