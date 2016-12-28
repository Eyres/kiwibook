<?php


/**
 * Class AjaxController
 */
class AjaxController
{
    const LIMIT = 20;

    /**
     * @param $request
     * @param Context $context
     * @return mixed
     */
    public function logout($request, $context)
    {
        session_destroy();
        $context->notification= 'Vous êtes bien déconnecté';

        return $context->jsonSerialize();
    }

}
