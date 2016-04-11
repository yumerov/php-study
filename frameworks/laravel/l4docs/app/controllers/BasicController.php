<?php

class BasicController extends \BaseController {

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    return [
      'id' => $id,
      'username' => 'batman',
      'full_name' => 'Bruce Wayne',
    ];
  }

}
