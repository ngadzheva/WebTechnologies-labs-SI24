<?php
  require_once "db.php";

  /**
   * Use this class to manage user session tokens
   */
  class TokenUtility {
      private $db;

      public function __construct() {
          $this->db = new Database();
      }

      /**
       * Create user session token
       */
      public function createToken($token, $userId, $expires) {
        $token = $this->db->insertTokenQuery(["token" => $token, "user_id" => $userId, "expires" => $expires]);

        return $token;
      }

      /**
       * Check whether the token is valid
       */
      public function checkToken($token) {
        $tokenData = $this->db->selectTokenQuery(["token" => $token]);

        if ($tokenData["success"]) {
          $savedToken = $tokenData["data"];

          if ($savedToken) {
            return true;
          } else {
            return false;
          }
        } else {
          return false;
        }
      }
  }
?>