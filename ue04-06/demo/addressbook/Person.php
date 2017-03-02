<?php

/**
 * Namespace Addressbook wird definiert um Namenskonflikte mit anderen "Person"-Klassen zu vermeiden.
 */
namespace Addressbook;

/**
 * Die Klasse Person definiert eine Person mit Geschlecht, Nach- und Vorname, sowie E-Mail-Adresse
 * @package Addressbook
 */
class Person {
    private $gender;
    private $lastname;
    private $firstname;
    private $email;

    /**
     * Der Konstruktor legt eine Person mit allen vier Details an. Werden diese weggelassen, werden sie durch leere
     * Strings vorbelegt. Die Parameter sind als String typisiert (erst ab PHP 7 möglich).
     * @param string $gender Das Geschlecht der Person.
     * @param string $lastname Der Nachname der Person.
     * @param string $firstname Der Vorname der Person.
     * @param string $email Die E-Mail-Adresse der Person.
     */
    function __construct(string $gender = "", string $lastname = "", string $firstname = "", string $email = "") {
        $this->gender = $gender;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
    }

    /**
     * Die magische Methode __get erlaubt es, auf private Instanzvariablen wie auf öffentliche zuzugreifen. Dabei wird
     * die Variable nur zurück gegeben, wenn es sie in der Klassendefinition auch gibt.
     * @param mixed $property Gibt die Instanzvariable zurück.
     * @return mixed Gibt die Variable oder sonst null zurück.
     */
    function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    /**
     * Die magische Methode __set erlaubt es, private Instanzvariablen wie öffentliche zu setzen. Dabei geschieht dies
     * nur, wenn es diese in der Klassendefinition auch gibt.
     * @param mixed $property Die zu setzende Instanzvariable.
     * @param mixed $value Der zu setzende Wert.
     */
    function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}