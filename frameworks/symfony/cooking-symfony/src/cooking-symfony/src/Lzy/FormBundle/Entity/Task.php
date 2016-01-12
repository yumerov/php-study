<?php

namespace Lzy\FormBundle\Entity;

class Task {

  /**
   * @var String
   */
  protected $task;

  /**
   * @var \DateTime
   */
  protected $dueDate;
  
  /**
   * @var integer
   */
  protected $priority;

  /**
   * @return string
   */
  function getTask() {
    return $this->task;
  }

  /**
   * @return \DateTime
   */
  function getDueDate() {
    return $this->dueDate;
  }

  /**
   * @param string $task
   * @return \Lzy\FormBundle\Entity\Task
   */
  function setTask($task) {
    $this->task = $task;

    return $this;
  }

  /**
   * @param \DateTime $dueDate
   * @return \Lzy\FormBundle\Entity\Task
   */
  function setDueDate(\DateTime $dueDate) {
    $this->dueDate = $dueDate;

    return $this;
  }
  
  function getPriority()
  {
   return $this->priority;
  }

}
