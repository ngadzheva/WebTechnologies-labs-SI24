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
      }

      /**
       * Check whether the token is valid
       */
      public function checkToken($token) {
      }
  }
?>