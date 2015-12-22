<?php

namespace Lzy\FormDummyBundle\Entity;

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
   * @return \Lzy\FormDummyBundle\Entity\Task
   */
  function setTask($task) {
    $this->task = $task;
    
    return $this;
  }

  /**
   * @param \DateTime $dueDate
   * @return \Lzy\FormDummyBundle\Entity\Task
   */
  function setDueDate(\DateTime $dueDate) {
    $this->dueDate = $dueDate;
    
    return $this;
  }


  
}
