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
    /**
     * @param $request
     * @param Context $context
     * @return mixed
     */
    public function loadMessage($request, $context)
    {
        $messageTable = new messageTable();
        $context->__set('messages', $messageTable->getMessages(10, $request['offset']));

        return $context->jsonSerialize();
    }
    /**
     * @param $request
     * @param Context $context
     * @return mixed
     */
    public function loadAmis($request, $context)
    {
        $amisTable = new utilisateurTable();
        $context->__set('amis', $amisTable->getUsers(10, $request['offset']));

        return $context->jsonSerialize();
    }

}
