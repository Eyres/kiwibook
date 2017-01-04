<?php


/**
 * Class AjaxController
 */
class AjaxController
{
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
