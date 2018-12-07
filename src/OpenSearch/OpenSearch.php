<?php 
namespace OpenSearch;

use OpenSearch\Client\OpenSearchClient;
use OpenSearch\Util\SearchParamsBuilder;
use OpenSearch\Util\SuggestParamsBuilder;
use OpenSearch\Util\ClauseParamsBuilder;
use OpenSearch\Util\UrlParamsBuilder;
use OpenSearch\Client\SearchClient;
use OpenSearch\Client\SuggestClient;
/**
 * 
 */
class OpenSearch
{
	public $client;

	public $config;

	/**
	 *构造函数
	 *@param $option array  accessKeyId secret endPoint options appName suggestName
	**/
	public function __construct($option=[])
	{
		$this->config = $option;
		$this->client = new OpenSearchClient($option['accessKeyId'], $option['secret'], $option['endPoint'], $option['options']);
	}

	/**
	 *搜索
	 *@param where string 格式为：索引名:'关键词' [AND|OR ...]
	 *@param sort array 例：['field'=>'sort','order'=>1] 排序策略，有降序0或者升序1，默认降序。
	 *@param start int 偏移量
	 *@param hits int 
	 *@param summarys array  array('summary_field' => 'description', 'summary_len' => 100, 'summary_ellipsis' => "。。。", '		summary_snippet' => 2, 'summary_element_prefix' => '<span class=a1>', 'summary_element_postfix' 		=> '</span>')
	 *@return return object
	 *@author author zhou
	 *@date 2018-12-07 10:57:00
	**/
	public function search($where,$filter='',$sort=[],$start=0,$hits=20,$distace='',$summarys=[],$format='fulljson')
	{
		$searchClient = new SearchClient($this->client);

		$params = new SearchParamsBuilder();
		$params->setStart($start);
		$params->setHits($hits);
		$params->setAppName($this->config['appName']);
		if($where!='')
			$params->setQuery($where);
		$params->setFormat($format);
		if($filter!='')
			$params->setFilter($filter);
		if(!empty($sort))
			$params->addSort($sort['field'],$sort['order']);
		if(!empty($summarys))
		{
			if(isset($summarys['summary_field']))
			{
				$params->addSummary($summarys);
			}else{
				foreach ($summarys as $summary) {
					$params->addSummary($summary);
				}
			}
		}
		
		$ret = $searchClient->execute($params->build())->result;
		return $ret;
	}

	public function suggest($key,$hit=5)
	{
		$suggestClient = new SuggestClient($this->client);
		//创建下拉提示参数对象
		$params = SuggestParamsBuilder::build($this->config['appName'],$this->config['suggestName'], $key, $hit);
		//执行查询并返回下拉提示信息
		$ret = $suggestClient->execute($params);
		//打印返回消息
		return $ret->result;
	}
}
 ?>