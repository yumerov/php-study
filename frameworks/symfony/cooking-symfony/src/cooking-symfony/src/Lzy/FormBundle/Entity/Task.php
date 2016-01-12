<?php

namespace Lzy\FormBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Task {

  /**
   * @var String
   */
  protected $task;

  /**
   * @var String
   */
  protected $flag;

  /**
   * @var \DateTime
   */
  protected $dueDate;

  /**
   * @var integer
   */
  protected $priority;

  /**
   *
   * @var \Doctrine\Common\Collections\ArrayCollection
   */
  protected $tags;

  public function __construct() {
    $this->tags = new ArrayCollection();
  }

  /**
   * @return string
   */
  function getTask() {
    return $this->task;
  }

  function getFlag() {
    return $this->flag;
  }

  function setFlag(String $flag) {
    $this->flag = $flag;
  }

  /**
   * @return DateTime
   */
  function getDueDate() {
    return $this->dueDate;
  }

  /**
   * @param string $task
   * @return Task
   */
  function setTask($task) {
    $this->task = $task;

    return $this;
  }

  /**
   * @param DateTime $dueDate
   * @return Task
   */
  function setDueDate(DateTime $dueDate) {
    $this->dueDate = $dueDate;

    return $this;
  }

  function getPriority() {
    return $this->priority;
  }

  public function getTags() {
    return $this->tags;
  }

}
