<?php 

class Users extends Conexao
{

	# Mètodo para fazer o Login
	public function setLogged($email, $password)
	{

		$pdo = parent::get_instance();

		$sql = "

		SELECT * FROM users
		WHERE email = :email
		AND despassword = :password

		";

		$sql = $pdo->prepare($sql);

		$sql->bindValue(":email", $email);
		$sql->bindValue(":password", $password);

		$sql->execute();

		if( $sql->rowCount() > 0 )
		{

			$sql = $sql->fetch();

			$id = $sql['id'];

			$_SESSION['user'] = $id;

			header("Location: ../view/index.php?login_success");
			exit;

		}#end if
		else
		{
			echo "<script>

				alert('E-mail ou senha incorreto');

			</script>";

			echo "<script>

				window.location.href = '../login.php'

			</script>";

			//header("Location: ../login.php?not_login");

			exit;


		}#end else

	}#END setLogged


	# Mètodo para fazer Logout
	public function logout()
	{

		unset($_SESSION['user']);


	}#END logout

}#END Users

 ?>