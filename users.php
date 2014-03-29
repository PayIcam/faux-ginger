<?php

class Users {    
    protected static $users = array(
        array(
            "login"            => "mguffroy",
            "nom"              => "Guffroy",
            "prenom"           => "Matthieu",
            "mail"             => "matthieu.guffroy@etu.utc.fr",
            "type"             => "etu",
            "is_adulte"        => true,
            "is_cotisant"      => true,
            "badge_uid"        => "01234567",
            "expiration_badge" => "2018-01-01"
        ),
        array(
            "login"            => "agir",
            "nom"              => "Giraud",
            "prenom"           => "Antoine",
            "mail"             => "antoine.giraud@outlook.com",
            "type"             => "etu",
            "is_adulte"        => true,
            "is_cotisant"      => true,
            "badge_uid"        => "AG234567",
            "expiration_badge" => "2018-01-01"
        ),
        array(
            "login"            => "vderville",
            "nom"              => "Derville",
            "prenom"           => "Victor",
            "mail"             => "victor.derville@2015.icam.fr",
            "type"             => "etu",
            "is_adulte"        => true,
            "is_cotisant"      => true,
            "badge_uid"        => "VD234567",
            "expiration_badge" => "2018-01-01"
        ),
        array(
            "login"            => "landre",
            "nom"              => "Andre",
            "prenom"           => "Louis",
            "mail"             => "louis.andre@2015.icam.fr",
            "type"             => "etu",
            "is_adulte"        => true,
            "is_cotisant"      => true,
            "badge_uid"        => "LA234567",
            "expiration_badge" => "2018-01-01"
        ),
        array(
            "login"            => "phonore",
            "nom"              => "Honoré",
            "prenom"           => "Pierre",
            "mail"             => "pierre.honore@2015.icam.fr",
            "type"             => "etu",
            "is_adulte"        => true,
            "is_cotisant"      => true,
            "badge_uid"        => "PH234567",
            "expiration_badge" => "2018-01-01"
        )
    );

    public static function getByLogin($login){
        foreach(self::$users as $user){
            if($user["mail"] == $login || $user["login"] == $login){
                return $user;
            }
        }
	if (preg_match('/^[a-z-]+[.]+[a-z-]+@([0-9]{4}[.])?icam[.]fr$/', $login)) {
            $prenomNomPromoIcamFr = explode('@', $login);
            $prenomNom = explode('.', $prenomNomPromoIcamFr[0]);
            $prenom = $prenomNom[0];
            $nom = $prenomNom[1];
            $promo = current(explode('.', $prenomNomPromoIcamFr[1]));
            $user = array(
                "login"            => $login,
                "nom"              => $nom,
                "prenom"           => $prenom,
                "promo"            => $promo,
                "mail"             => $login,
                "type"             => "etu",
                "is_adulte"        => true,
                "is_cotisant"      => true,
                "badge_uid"        => null,
                "expiration_badge" => null
            );
	    return $user;
        }
        return null;
    }

    public static function getByBadge($badge){
        foreach(self::$users as $user){
            if($user["badge_uid"] == $badge){
                return $user;
            }
        }
        return null;
    }

} 
