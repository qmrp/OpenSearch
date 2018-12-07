<?php 
namespace OpenSearch\Generated\SecondRank;
/**
 * Autogenerated by Thrift Compiler (0.10.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use OpenSearch\Thrift\Base\TBase;
use OpenSearch\Thrift\Type\TType;
use OpenSearch\Thrift\Type\TMessageType;
use OpenSearch\Thrift\Exception\TException;
use OpenSearch\Thrift\Exception\TProtocolException;
use OpenSearch\Thrift\Protocol\TProtocol;
use OpenSearch\Thrift\Protocol\TBinaryProtocolAccelerated;
use OpenSearch\Thrift\Exception\TApplicationException;

class SecondRankService_listAll_args {
  static $_TSPEC;


  public function __construct() {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        );
    }
  }

  public function getName() {
    return 'SecondRankService_listAll_args';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('SecondRankService_listAll_args');
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}
 ?>