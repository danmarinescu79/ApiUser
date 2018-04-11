<?php

/**
 * @Author: Dan Marinescu
 * @Date:   2018-03-22 16:46:25
 * @Last Modified by:   Dan Marinescu
 * @Last Modified time: 2018-04-03 13:44:50
 */

namespace ApiUser\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserDetail
 *
 * @ORM\Table(name="user_detail")
 * @ORM\Entity(repositoryClass="ApiUser\Repository\UserDetail")
 */
class UserDetail
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\OneToOne(targetEntity="ApiBase\Entity\OAuthUser", inversedBy="detail")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName.
     *
     * @param string|null $firstName
     *
     * @return UserDetail
     */
    public function setFirstName($firstName = null)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string|null
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName.
     *
     * @param string|null $lastName
     *
     * @return UserDetail
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set user.
     *
     * @param \ApiBase\Entity\OAuthUser|null $user
     *
     * @return UserDetail
     */
    public function setUser(\ApiBase\Entity\OAuthUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \ApiBase\Entity\OAuthUser|null
     */
    public function getUser()
    {
        return $this->user;
    }

    public function toArray()
    {
        return [
            'first_name' => $this->firstName,
            'last_name'  => $this->lastName,
        ];
    }
}
