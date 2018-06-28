<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employees extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'imgUrl',
        'sociability',
        'engineering_skill',
        'time_management',
        'knowledge_of_languages',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'surname' => 'string',
        'patronymic' => 'string',
        'imgUrl' => 'string',
        'sociability' => 'integer',
        'engineering_skill' => 'integer',
        'time_management' => 'integer',
        'knowledge_of_languages' => 'integer',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'avatarUrl',
    ];


    public function getAvatarUrlAttribute(): string
    {
        return Storage::url($this->attributes['imgUrl']);
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Employees
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Employees
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * Set patronymic
     *
     * @param string $patronymic
     *
     * @return Employees
     */
    public function setPatronymic(string $patronymic): self
    {
        $this->patronymic = $patronymic;

        return $this;
    }

    /**
     * Get patronymic
     *
     * @return string
     */
    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     *
     * @return Employees
     */
    public function setAvatar(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->imgUrl;
    }

    /**
     * Set sociability
     *
     * @param int $sociability
     *
     * @return Employees
     */
    public function setSociability(int $sociability): self
    {
        $this->sociability = $sociability;

        return $this;
    }

    /**
     * Get sociability
     *
     * @return int
     */
    public function getSociability(): int
    {
        $this->sociability;
    }

    /**
     * Set engineering skill
     *
     * @param int $engineeringSkill
     *
     * @return Employees
     */
    public function setEngineeringSkill(int $engineeringSkill): self
    {
        $this->engineering_skill = $engineeringSkill;

        return $this;
    }

    /**
     * Get engineering skill
     *
     * @return int
     */
    public function getEngineeringSkill(): int
    {
        return $this->engineering_skill;
    }

    /**
     * Set time management
     *
     * @param int $timeManagement
     *
     * @return Employees
     */
    public function setTimeManagement(int $timeManagement): self
    {
        $this->time_management = $timeManagement;

        return $this;
    }

    /**
     * Get time management
     *
     * @return int
     */
    public function getTimeManagement(): int
    {
        return $this->time_management;
    }

    /**
     * Set knowledge of languages
     *
     * @param int $knowledgeOfLanguages
     *
     * @return Employees
     */
    public function setKnowledgeOfLanguages(int $knowledgeOfLanguages): self
    {
        $this->knowledge_of_languages = $knowledgeOfLanguages;

        return $this;
    }

    /**
     * Get knowledge of languages
     *
     * @return int
     */
    public function getKnowledgeOfLanguages(): int
    {
        return $this->knowledge_of_languages;
    }

    /**
     * Get projects
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->belongsToMany('App\Projects');
    }
}
