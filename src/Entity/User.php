<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"email"}, message="Cette adresse email est prise")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastConnexion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $suspended;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="owner")
     */
    private $tickets;

    /**
     * @ORM\OneToMany(targetEntity=Conversation::class, mappedBy="staff")
     */
    private $chat;

    /**
     * @ORM\OneToMany(targetEntity=Conversation::class, mappedBy="owner")
     */
    private $conv;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="Author")
     */
    private $UserMessageList;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nightmode;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $address;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
        $this->chat = new ArrayCollection();
        $this->conv = new ArrayCollection();
        $this->UserMessageList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getLastConnexion(): ?\DateTimeInterface
    {
        return $this->lastConnexion;
    }

    public function setLastConnexion(\DateTimeInterface $lastConnexion): self
    {
        $this->lastConnexion = $lastConnexion;

        return $this;
    }

    public function getSuspended(): ?bool
    {
        return $this->suspended;
    }

    public function setSuspended(bool $suspended): self
    {
        $this->suspended = $suspended;

        return $this;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setOwner($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getOwner() === $this) {
                $ticket->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Conversation[]
     */
    public function getChat(): Collection
    {
        return $this->chat;
    }

    public function addChat(Conversation $chat): self
    {
        if (!$this->chat->contains($chat)) {
            $this->chat[] = $chat;
            $chat->setStaff($this);
        }

        return $this;
    }

    public function removeChat(Conversation $chat): self
    {
        if ($this->chat->removeElement($chat)) {
            // set the owning side to null (unless already changed)
            if ($chat->getStaff() === $this) {
                $chat->setStaff(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Conversation[]
     */
    public function getConv(): Collection
    {
        return $this->conv;
    }

    public function addConv(Conversation $conv): self
    {
        if (!$this->conv->contains($conv)) {
            $this->conv[] = $conv;
            $conv->setOwner($this);
        }

        return $this;
    }

    public function removeConv(Conversation $conv): self
    {
        if ($this->conv->removeElement($conv)) {
            // set the owning side to null (unless already changed)
            if ($conv->getOwner() === $this) {
                $conv->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getUserMessageList(): Collection
    {
        return $this->UserMessageList;
    }

    public function addUserMessageList(Message $userMessageList): self
    {
        if (!$this->UserMessageList->contains($userMessageList)) {
            $this->UserMessageList[] = $userMessageList;
            $userMessageList->setAuthor($this);
        }

        return $this;
    }

    public function removeUserMessageList(Message $userMessageList): self
    {
        if ($this->UserMessageList->removeElement($userMessageList)) {
            // set the owning side to null (unless already changed)
            if ($userMessageList->getAuthor() === $this) {
                $userMessageList->setAuthor(null);
            }
        }

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getNightmode(): ?string
    {
        return $this->nightmode;
    }

    public function setNightmode(?string $nightmode): self
    {
        $this->nightmode = $nightmode;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }
}
