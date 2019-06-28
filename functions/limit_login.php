/**
 * CLASS LIMIT LOGIN ATTEMPTS
 * Prevent Mass WordPress Login Attacks by setting locking the system when login fail.
 * To be added in functions.php or as an external file.
 */

if ( ! class_exists( 'Limit_Login_Attempts' ) ) {
    class Limit_Login_Attempts {
  
        var $failed_login_limit = 3;                    //Number of authentication accepted
        var $lockout_duration   = 1800;                 //Stop authentication process for 30 minutes: 60*30 = 1800
        var $transient_name     = 'attempted_login';    //Transient used
  
        public function __construct() {
            add_filter( 'authenticate', array( $this, 'check_attempted_login' ), 30, 3 );
            add_action( 'wp_login_failed', array( $this, 'login_failed' ), 10, 1 );
        }
  
        /**
         * Lock login attempts of failed login limit is reached
         */
        public function check_attempted_login( $user, $username, $password ) {
            if ( get_transient( $this->transient_name ) ) {
                $datas = get_transient( $this->transient_name );
  
                if ( $datas['tried'] >= $this->failed_login_limit ) {
                    $until = get_option( '_transient_timeout_' . $this->transient_name );
                    $time = $this->when( $until );
  
                    //Display error message to the user when limit is reached
                    return new WP_Error( 'too_many_tried', sprintf( __( '<strong>ERROR</strong>: You have reached authentication limit, you will be able to try again in %1$s.' ) , $time ) );
                }
            }
  
            return $user;
        }
  
  
        /**
         * Add transient
         */
        public function login_failed( $username ) {
            if ( get_transient( $this->transient_name ) ) {
                $datas = get_transient( $this->transient_name );
                $datas['tried']++;
  
                if ( $datas['tried'] <= $this->failed_login_limit )
                    set_transient( $this->transient_name, $datas , $this->lockout_duration );
            } else {
                $datas = array(
                    'tried'     => 1
                );
                set_transient( $this->transient_name, $datas , $this->lockout_duration );
            }
        }
  
  
        /**
         * Return difference between 2 given dates
         * @param  int      $time   Date as Unix timestamp
         * @return string           Return string
         */
        private function when( $time ) {
            if ( ! $time )
                return;
  
            $right_now = time();
  
            $diff = abs( $right_now - $time );
  
            $second = 1;
            $minute = $second * 60;
            $hour = $minute * 60;
            $day = $hour * 24;
  
            if ( $diff < $minute )
                return floor( $diff / $second ) . ' secondes';
  
            if ( $diff < $minute * 2 )
                return "about 1 minute ago";
  
            if ( $diff < $hour )
                return floor( $diff / $minute ) . ' minutes';
  
            if ( $diff < $hour * 2 )
                return 'about 1 hour';
  
            return floor( $diff / $hour ) . ' hours';
        }
    }
}

//Enable it:
new Limit_Login_Attempts();