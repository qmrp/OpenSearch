<?php 
namespace OpenSearch\Generated\Search;

interface OpenSearchSearcherServiceIf extends \OpenSearch\Generated\GeneralSearcher\GeneralSearcherService {
  /**
   * @param \OpenSearch\Generated\Search\SearchParams $searchParams
   * @return \OpenSearch\Generated\GeneralSearcher\SearchResult
   * @throws \OpenSearch\Generated\Common\OpenSearchException
   * @throws \OpenSearch\Generated\Common\OpenSearchClientException
   */
  public function execute(\OpenSearch\Generated\Search\SearchParams $searchParams);
}
 ?>