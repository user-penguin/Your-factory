<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            'student' => 'student',
            'parent' => 'parent',
            'employee' => 'employee',
        ];
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null $firstName
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Regex(pattern="/^[A-Z]{1}[a-z]*$/", message="govnocase deteted")
     */
    private $firstName;

    /**
     * @var string|null $lastName
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Regex(pattern="/^[A-Z]{1}[a-z]*$/", message="govnocase deteted")
     */
    private $lastName;

    /**
     * @var string|null $patronymic
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^[A-Z]{1}[a-z]*$/", message="govnocase deteted")
     */
    private $patronymic;

    /**
     * @var string|null $role
     * @ORM\Column(type="string", nullable=true)
     */
    private $role;

    /**
     * @var string|null $phone
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $phone;

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    /**
     * @param string $patronymic
     */
    public function setPatronymic(string $patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }


}
