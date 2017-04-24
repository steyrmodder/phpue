<?php

/**
 * The namespace SimpleAddressBook is being defined to avoid name conflicts with other "Person" classes.
 */

namespace SimpleAddressBook;

/**
 * Defines a person with several attributes such as name, gender or an e-mail address.
 *
 * This class defines a person with gender, first and last name as well as an e-mail address. Person properties can be
 * set and retrieved using magic methods.
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @version 2017
 * @package SimpleAddressBook
 */
class Person
{
    /**
     * @var string $gender A person's gender (usually male or female but open to anything that is desired).
     */
    private $gender;

    /**
     * @var string $lastName A person's last name.
     */
    private $lastName;

    /**
     * @var string $firstName A person's first name.
     */
    private $firstName;

    /**
     * @var string $email A person's e-mail address.
     */
    private $email;

    /**
     * Creates a person with a full set of details (gender, last name, first name, e-mail address). If certain
     * parameters are not set, they are replaced by default values.
     * @param string $gender A person's gender.
     * @param string $lastName A person's last name.
     * @param string $firstName A person's first name.
     * @param string $email A person's e-mail address.
     */
    public function __construct(string $gender = "", string $lastName = "", string $firstName = "", string $email = "")
    {
        $this->gender = $gender;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
    }

    /**
     * The magic method __get grants read access to private properties as if they were public. A variable is only
     * returned if it exists in the class definition.
     * @param mixed $property The desired property.
     * @return mixed|null Returns the property or otherwise null.
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        return null;
    }

    /**
     * The magic method __set grants write access to private properties as if they were public. A variable is only
     * returned if it exists in the class definition.
     * @param mixed $property The property to be set.
     * @param mixed $value The value to be set for the given property.
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
