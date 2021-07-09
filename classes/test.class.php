<?php

class Test extends Dbh
{
    public $domain = array();
    public $dom = array();

    public function getUsers()
    {
        if (!isset($_POST['byDate'])) {
            $sql = "SELECT * FROM users ORDER BY `date`";
        }
        if (isset($_POST['byDate'])) {
            $sql = "SELECT * FROM users ORDER BY `date`";
        }
        if (isset($_POST['byEmail'])) {
            $sql = "SELECT * FROM users ORDER BY `email`";
        }

        $stmt = $this->connect()->query($sql);

        $list = array();
        while ($row = $stmt->fetch()) {
            $list[] = $row;
        }
        return $list;
    }

    public function getUsersByDomain($selectDomain)
    {
        if (!isset($_POST['byDate'])) {
            $sql = "SELECT * FROM users WHERE email LIKE '%$selectDomain%' ORDER BY `date`";
        } else if (isset($_POST['byDate'])) {
            $sql = "SELECT * FROM users WHERE email LIKE '%$selectDomain%' ORDER BY `date`";
        } else if (isset($_POST['byEmail'])) {
            $sql = "SELECT * FROM users WHERE email LIKE '%$selectDomain%' ORDER BY `email`";
        }

        $stmt = $this->connect()->query($sql);

        $list = array();
        while ($row = $stmt->fetch()) {
            $list[] = $row;
        }
        return $list;
    }
    public function getEmails()
    {
        $sql = "SELECT email FROM users";
        $stmt = $this->connect()->query($sql);
        while ($dn = $stmt->fetch()) {
            $domain[] = $dn;
        }
        return $domain;
    }

    public function getDomainName()
    {
        $emails = $this->getEmails();
        $providers = array();
        foreach ($emails as $email) {
            $domain = explode("@", $email["email"])[1];
            $domainParts = explode(".", $domain);
            $provider = $domainParts[count($domainParts) - 2];
            if (!in_array($provider, $providers)) array_push($providers, $provider);
        }
        return $providers;
    }

    public function deleteRecord($id)
    {
        $sql = "DELETE FROM users WHERE id = '$id'";
        $query = $this->connect()->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
