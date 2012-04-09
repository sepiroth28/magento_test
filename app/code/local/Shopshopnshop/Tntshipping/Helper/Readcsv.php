<?php

class Shopshopnshop_Tntshipping_Helper_readcsv extends Mage_Core_Helper_Abstract
{
public function hello(){
	echo 'hello';
}
 public function readCSV($filename, $delimiter=",", $maxLines=999999, $startLine=0){
			$commondata = array();
			try
			{
				if (file_exists($filename))
				{			
					$file = fopen($filename, 'r');
					$data;
					$count = 0;
					$columns = array();
			
					while (($line = fgetcsv($file, 0, $delimiter)) !== FALSE) 
					{
						$count++;
						if ($count==1) // read the headers
						{
						   $cnt =0;
						   $nvt_cnt = 1;
						   foreach($line as $col)
						   {
								$col_name = trim($col);
								$columns[$cnt] = $col_name;
								$cnt++;
						   }
						   continue;
						}
				
						//this checks for empty lines and double headers
						if(empty($line[0]) || ($line[0]) == "sku")
							continue;
				
						if ($count<$startLine)
						{
							unset($line);
							continue;
						}
						if ($count >= $maxLines + $startLine)
						{
							 break;
						}

						foreach ($columns as $colIndex => $colName)
						{
							if ($colName != "")
								if(array_key_exists($colIndex, $line))
									$data[$colName] = $line[$colIndex];
								else
									$data[$colName] = "";
						}
						$commondata[$count-1] = $data;
						unset($data);
						unset($line);
					}
					unset($columns);
					return $commondata;
			
				}
				else
				{
					return null;
				}
			}
			catch (Exception $e)
			{
				echo 'Error: ' . $e->getMessage() . "\n";
				unset($commondata);
			}
			return null;
		}

}
