<?php
/**
 * Created by PhpStorm.
 * User: msaye
 * Date: 2/24/2019
 * Time: 11:18 PM
 */

namespace App\gm\travel\Repository;


use App\gm\travel\Model\Partner;

class PartnerRepository
{
    // add new
    public function AddNewPartner($partnerData)
    {
        $partner = new Partner();

        $partner->name     = $partnerData['name'];
        $partner->phone    = $partnerData['phone'];
        $partner->address  = $partnerData['address'];
        $partner->mail     = $partnerData['mail'];

        return $partner->save();
    }


    // updated
    public function UpdatedPartner($partnerData)
    {
        $partner= Partner::find($partnerData['id']);

        $partner->name     = $partnerData['name'];
        $partner->phone    = $partnerData['phone'];
        $partner->address  = $partnerData['address'];
        $partner->mail     = $partnerData['mail'];

        return $partner->save();

    }

    // get all
    public function GetAllPartner()
    {
        return Partner::orderBy('updated_at', 'DESC')->get();
    }

    // get by id
    public function getByid($id)
    {
        return Partner::find($id);
    }



}