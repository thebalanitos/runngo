<?php 
	include "db_config.php";
	date_default_timezone_set('Europe/Bucharest');

	class User
	{	
		public $db;
		public function __construct()
		{
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) 
			{
				echo "Nu s-a putut face conexiunea la baza de date.";
				exit;
			}
			mysqli_set_charset($this->db, 'utf8');
		}

		// Procesul de inregistrare
		public function reg_user($email, $parola, $prenume, $nume)
		{
			$email = mysqli_real_escape_string($this->db, $email);
			$prenume = mysqli_real_escape_string($this->db, $prenume);
			$nume = mysqli_real_escape_string($this->db, $nume);
			
			$parola = md5($parola);
			$sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
			
			// Verific daca userul sau emailul este in baza de date
			$check =  $this->db->query($sql);
			$count_row = $check->num_rows;

			// Daca nu este, insereaza in tabel datele
			if ($count_row == 0)
			{
				$ip = $this->get_ip_address();
				$sql = "INSERT INTO users SET prenume='$prenume', nume='$nume', email='$email', parola='$parola', adresa_ip='$ip', data_cont='".date('Y-m-d H:i', time())."'";
				$result = mysqli_query($this->db,$sql);
        		return $result;
			}
			else return false;
		}

		// Procesul de logare
		public function check_login($email, $parola)
		{
			$email = mysqli_real_escape_string($this->db, $email);
			
        	$parola = md5($parola);
			$sql="SELECT id FROM users WHERE email='$email' AND parola='$parola'";
			
			// Verific daca utilizatorul este in baza de date si parola e corecta
        	$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;
		
	        if ($count_row == 1) 
			{
	            $_SESSION['login'] = true; 
	            $_SESSION['id'] = $user_data['id'];
				
				$ip = $this->get_ip_address();
				$id = $user_data['id'];
				$sql="UPDATE users SET adresa_ip='$ip' WHERE id='$id'";
				mysqli_query($this->db, $sql);
				
	            return true;
	        }
	        else return false;
    	}

		// Preia adresa IP a utilizatorului
		public function get_ip_address()
		{
			if (!empty($_SERVER['HTTP_CLIENT_IP']))
				$ip = $_SERVER['HTTP_CLIENT_IP'];
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else 
				$ip = $_SERVER['REMOTE_ADDR'];
			return $ip;
		}
		
    	// Pentru afisarea prenumelui unui utilizator
    	public function get_firstname($id)
		{
    		$sql="SELECT prenume FROM users WHERE id = $id";
	        $result = mysqli_query($this->db,$sql);
			$user_data = mysqli_fetch_array($result);
			return $user_data['prenume'];
    	}
		
		public function get_lastname($id)
		{
    		$sql="SELECT nume FROM users WHERE id = $id";
	        $result = mysqli_query($this->db,$sql);
			$user_data = mysqli_fetch_array($result);
			return $user_data['nume'];
    	}
		
		// Pentru afisarea numelui complet unui utilizator
    	public function get_fullname($id)
		{
    		$sql="SELECT prenume, nume FROM users WHERE id = $id";
	        $result = mysqli_query($this->db,$sql);
			$user_data = mysqli_fetch_array($result);
			return $user_data['prenume']." ".$user_data['nume'];
    	}

    	public function get_email($id)
		{
    		$sql="SELECT email FROM users WHERE id = $id";
	        $result = mysqli_query($this->db,$sql);
			$user_data = mysqli_fetch_array($result);
			return $user_data['email'];
    	}

		public function mysqli_result($res, $row = 0, $col = 0)
		{
			$numrows = mysqli_num_rows($res);
			if ($numrows && $row <= ($numrows - 1) && $row >= 0)
			{
				mysqli_data_seek($res,$row);
				$resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
				if (isset($resrow[$col]))
					return $resrow[$col];
			}
			return false;
		}
		
		public function time_passed($timestamp)
		{
			$timestamp      = strtotime($timestamp);
			$current_time   = strtotime($this->mysqli_result((mysqli_query($this->db, "SELECT NOW()"))));
			$diff           = $current_time - $timestamp;
			
			$intervals      = array (
				'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
			);
			
			$prepoz = "de";
			
			if ($diff == 0)
			{
				return 'chiar acum';
			}    

			if ($diff < 60)
			{
				if($diff < 20) $prepoz = "";
				return $diff == 1 ? 'acum o secundă' : 'acum ' . $diff . ' '. $prepoz .' secunde';
			}        

			if ($diff >= 60 && $diff < $intervals['hour'])
			{
				$diff = floor($diff/$intervals['minute']);
				if($diff < 20) $prepoz = "";
				return $diff == 1 ? 'acum un minut' : 'acum ' . $diff . ' '. $prepoz .' minute';
			}        

			if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
			{
				$diff = floor($diff/$intervals['hour']);
				if($diff < 20) $prepoz = "";
				return $diff == 1 ? 'acum o oră' : 'acum ' . $diff . ' '. $prepoz .' ore';
			}    

			if ($diff >= $intervals['day'] && $diff < $intervals['week'])
			{
				$diff = floor($diff/$intervals['day']);
				if($diff < 20) $prepoz = "";
				return $diff == 1 ? 'acum o zi' : 'acum ' . $diff . ' '. $prepoz .' zile';
			}    

			if ($diff >= $intervals['week'] && $diff < $intervals['month'])
			{
				$diff = floor($diff/$intervals['week']);
				if($diff < 20) $prepoz = "";
				return $diff == 1 ? 'acum o săptămână' : 'acum ' . $diff . ' '. $prepoz .' săptămâni';
			}    

			if ($diff >= $intervals['month'] && $diff < $intervals['year'])
			{
				$diff = floor($diff/$intervals['month']);
				if($diff < 20) $prepoz = "";
				return $diff == 1 ? 'acum o lună' : 'acum ' . $diff . ' '. $prepoz .' luni';
			}    

			if ($diff >= $intervals['year'])
			{
				$diff = floor($diff/$intervals['year']);
				if($diff < 20) $prepoz = "";
				return $diff == 1 ? 'acum un an' : 'acum ' . $diff . ' '. $prepoz .' ani';
			}
		}
		
    	// Verifica daca cititorul este logat
	    public function get_session()
		{
	        return isset($_SESSION['login']);
		}
		
		// Delogarea
	    public function user_logout() 
		{
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>