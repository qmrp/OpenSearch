<?php 
namespace OpenSearch\Generated\Search;

/**
 * Autogenerated by Thrift Compiler (0.9.3)
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
class Abtest {
  static $_TSPEC;

  /**
   * 场景标签。用户在控制台上配置哪些场景需要做实验，查询中只有指定了对应场景名的query才会进行实验。
   * 
   * @var string
   */
  public $sceneTag = null;
  /**
   * 流量分配标识。对该值进行hash，将用户查询分配到不同的实验中，该值通常可设置为最终用户的id。
   * 
   * @var string
   */
  public $flowDivider = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'sceneTag',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'flowDivider',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['sceneTag'])) {
        $this->sceneTag = $vals['sceneTag'];
      }
      if (isset($vals['flowDivider'])) {
        $this->flowDivider = $vals['flowDivider'];
      }
    }
  }

  public function getName() {
    return 'Abtest';
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
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->sceneTag);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->flowDivider);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
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
    $xfer += $output->writeStructBegin('Abtest');
    if ($this->sceneTag !== null) {
      $xfer += $output->writeFieldBegin('sceneTag', TType::STRING, 1);
      $xfer += $output->writeString($this->sceneTag);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->flowDivider !== null) {
      $xfer += $output->writeFieldBegin('flowDivider', TType::STRING, 2);
      $xfer += $output->writeString($this->flowDivider);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}
 ?>