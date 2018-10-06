 <?php 
/*  
 * Constantes de parâmetros para configuração da conexão  
 */  
define('HOST', '127.0.0.1');  
define('DBNAME', 'ccc');  
define('CHARSET', 'utf8');  
define('USER', 'root');  
define('PASSWORD', '');  

class Conexao{

  private static $instance;

   /*  
    * Escondendo o construtor da classe  
    */ 
  private function __construct() {  
    //método nunca será executado por ser privado. Questão de segurança  
  } 
 
  /*  
   * Método estático para retornar uma conexão válida  
   * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão  
   */  
  public static function getInstance(){
    if(!isset(self::$instance)){
      try {
        self::$instance = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        self::$instance->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES UTF8'); 
        self::$instance->setAttribute(PDO::ATTR_PERSISTENT, TRUE);
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
    return self::$instance;
  }
  

  public static function prepare($sql){
    return self::getInstance()->prepare($sql);
  }

}

function hashrec(){
  $sql = "SELECT email, username, senha FROM admin WHERE username= :username UNION SELECT email, username, senha FROM professor WHERE username= :username";
  $stm = Conexao::prepare($sql);
  $stm->bindParam(':username', $username);
  $stm->execute();
  

      $row=$stm->fetch(PDO::FETCH_ASSOC);
      $novo_valor= md5($row);


  
  return $novo_valor;
}




