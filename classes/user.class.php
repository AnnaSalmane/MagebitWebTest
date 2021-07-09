<?php

class User extends Dbh
{
    private $errors = array();

    public function signup($POST)
    {
        //validate
        foreach ($POST as $key => $value) {

            if ($key == "email") {

                $colombia = substr($value, -3);
                $ends = ".co";

                if ($colombia == $ends) {
                    $this->errors[] = "We are not accepting subscriptions from Colombia emails";
                }

                if (trim($value == "")) {
                    $this->errors[] = "Email address is required";
                }

                if (!filter_var($value, FILTER_VALIDATE_EMAIL) && $value != "") {
                    $this->errors[] = "Please provide a valid e-mail address";
                }

                if (!isset($_POST['checkbox'])) {
                    $this->errors[] = "You must accept the terms and conditions";
                }
            }
        }

        //save to database
        if (count($this->errors) == 0) {

            // save
            $sql = "INSERT INTO users (email, checkbox) values (:email, :checkbox)";
            $DB = new Dbh();

            $data = array();
            $data['email'] = $POST['email'];
            $data['checkbox'] = $POST['checkbox'];

            $result = $DB->write($sql, $data);
            if (!$result) {
                $this->errors[] = "Your data could not be saved";
            }
        }
        return $this->errors;
    }
}
