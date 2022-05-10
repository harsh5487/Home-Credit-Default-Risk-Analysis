<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Multiple charts</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(180, 26, 104, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        padding: 20px;
        background: rgba(0, 0, 0, 0.8 );
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 500px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(0, 0, 0, 1);
        background: rgba(255, 255, 255, 1 );
      }
    </style>
  </head>
  <body>
    <?php 
    $connect = new mysqli('localhost','root','','project');
    $query =  "SELECT application.Income_type, COUNT(p_application.Contract_status) AS Rejected, p_application.Purpose\n"

    . "FROM p_application\n"

    . "JOIN application ON application.Curr_id = p_application.Curr_id\n"

    . "WHERE p_application.Contract_status = \"Refused\" OR p_application.Contract_status = \"Canceled\"\n"

    . "GROUP BY p_application.Purpose\n"

    . "ORDER BY COUNT(p_application.Contract_status) DESC;";
    $result = $connect->query($query);
    
        foreach($result as $data)
        {
        $Purpose[] = $data['Purpose'];
        $Count[] = $data['Rejected'];
        }
    $query1 =  "SELECT application.Family_status, COUNT(p_application.Curr_id) AS Applied\n"

        . "FROM p_application\n"
    
        . "JOIN application ON application.Curr_id = p_application.Curr_id\n"
    
        . "GROUP BY application.Family_status\n"
    
        . "ORDER BY COUNT(p_application.Curr_id) DESC;";
        $result1 = $connect->query($query1);
    
        foreach($result1 as $data1)
        {
        $Family_status[] = $data1['Family_status'];
        $Count1[] = $data1['Applied'];
        }

        $query3 =  "SELECT application.Income_type, COUNT(p_application.Credit) as Count , AVG(application.Credit) as AVG \n"

        . "FROM p_application\n"
    
        . "JOIN application ON application.Curr_id = p_application.Curr_id\n"
    
        . "GROUP BY application.Income_type\n"
    
        . "ORDER BY COUNT(p_application.Credit) DESC;";
        $result3 = $connect->query($query3);
    
        foreach($result3 as $data3)
        {
        $Count6[] = $data3['Count'];
        $Income_type3[] = $data3['Income_type'];
        }

        $query4 = "SELECT application.House, COUNT(application.House) AS Count, application.Sex \n"

        . "FROM application\n"
    
        . "GROUP BY application.House\n"
    
        . "ORDER BY COUNT(application.House) DESC;";
        
          $result4 = $connect->query($query4);
          
            foreach($result4 as $data4)
            {
              $House[] = $data4['House'];
              $Count5[] = $data4['Count'];
            }
        
          $query5 = "SELECT application.Income_type, COUNT(p_application.Contract_status) AS Approved\n"

          . "FROM p_application\n"
      
          . "JOIN application ON application.Curr_id = p_application.Curr_id\n"
      
          . "WHERE p_application.Contract_status = \"Approved\"\n"
      
          . "GROUP BY application.Income_type\n"
      
          . "ORDER BY COUNT(p_application.Contract_status) DESC;";
        
          $result5 = $connect->query($query5);
          
            foreach($result5 as $data5)
            {
              $Income_type1[] = $data5['Income_type'];
              $Approved[] = $data5['Approved'];
            }
            $query6 = "SELECT application.Income_type, AVG(application.Income) as Avg_Income , COUNT(p_application.Contract_status) as Count\n"

            . "\n"
        
            . " FROM p_application\n"
        
            . "\n"
        
            . "    JOIN application ON application.Curr_id = p_application.Curr_id\n"
        
            . "\n"
        
            . "    WHERE p_application.Contract_status = \"Approved\"\n"
        
            . "\n"
        
            . "    GROUP BY application.Income_type\n"
        
            . "\n"
        
            . "    ORDER BY COUNT(p_application.Contract_status) DESC;";
          
            $result6 = $connect->query($query6);
            
              foreach($result6 as $data6)
              {
                $Avg_income[] = $data6['Avg_Income'];
                $Income_type2[] = $data6['Income_type'];
              }
              $query7 = "SELECT application.Family_status, COUNT(p_application.Curr_id)  AS Count\n"

    . "FROM p_application\n"

    . "JOIN application ON application.Curr_id = p_application.Curr_id\n"

    . "WHERE p_application.Contract_status = \"Approved\"\n"

    . "GROUP BY application.Family_status\n"

    . "ORDER BY COUNT(p_application.Curr_id) DESC;";
    $result7 = $connect->query($query7);
    
        foreach($result7 as $data7)
        {
        $Family_status1[] = $data7['Family_status'];
        $Count3[] = $data7['Count'];
        }
        $query8 = "SELECT application.Family_status, COUNT(p_application.Curr_id) as Count\n"
        . "FROM p_application\n"
        . "JOIN application ON application.Curr_id = p_application.Curr_id\n"
        . "GROUP BY application.Family_status\n"
        . "ORDER BY COUNT(p_application.Curr_id) DESC;";
     $result8 = $connect->query($query8);
     
         foreach($result8 as $data8)
         {
         $Family_status2[] = $data8['Family_status'];
         $Count4[] = $data8['Count'];
         }

      $query9 = "SELECT application.Education, COUNT(p_application.Curr_id) AS Count \n"

      . "FROM p_application\n"
  
      . "JOIN application ON application.Curr_id = p_application.Curr_id\n"
  
      . "WHERE p_application.Contract_status = \"Approved\"\n"
  
      . "GROUP BY application.Education\n"
  
      . "ORDER BY COUNT(p_application.Curr_id) DESC;";
     $result9 = $connect->query($query9);
     
         foreach($result9 as $data9)
         {
         $Education[] = $data9['Education'];
         $Count7[] = $data9['Count'];
         }

    ?>
    <div class="chartMenu">
      <p>Home Credit Project</p>
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="pieChart1"></canvas>
      </div>
    <div class="chartBox">
        <canvas id="pieChart2"></canvas>
    </div>
    </div>
    <div class="chartCard">
    <div class="chartBox">
        <canvas id="pieChart3"></canvas>
    </div>
    <div class="chartBox">
        <canvas id="pieChart4"></canvas>
      </div>
    </div>
    <div class="chartMenu">
      <p>Credit Project</p>
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="barChart1"></canvas>
      </div>
      <div class="chartBox">
        <canvas id="barChart2"></canvas>
      </div>
    </div>
    <div class="chartMenu">
      <p>Credit Project</p>
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="mixChart1"></canvas>
      </div>
      <div class="chartBox">
        <canvas id="barChart3"></canvas>
      </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // setup 
    //pie chart
    const datapie1 = {
      labels: <?php echo json_encode($Purpose) ?>,
      datasets: [{
        label: 'Weekly Sales',
        data: <?php echo json_encode($Count) ?>,
        backgroundColor: [
          'rgba(198, 8, 209, 0.8)',
          'rgba(254, 119, 253, 0.8)',
          'rgba(255, 169, 253, 0.8)',
          'rgba(41, 0, 163, 0.8)',
          'rgba(0, 128, 0, 0.8)',
          'rgba(120, 128, 0, 0.8)',
          'rgba(0, 128, 0, 0.8)',
          'rgba(255, 200, 0 , 0.8)',
          'rgba(198, 8, 209, 0.8)',
          'rgba(254, 119, 253, 0.8)',
          'rgba(255, 169, 253, 0.8)',
          'rgba(41, 0, 163, 0.8)',
          'rgba(55, 128, 0, 0.8)',
          'rgba(200, 128, 0, 0.6)',
          'rgba(168, 128, 0, 0.8)',
          'rgba(255, 200, 0 , 0.8)',
          'rgba(255, 206, 86, 0.8)'
          
        ],
      }]
    };
    const configpie1 = {
      type: 'pie',
      data: datapie1,
      options: {   
    plugins: {
      legend: {
        display: true,
        position: 'right'
      }
      
    }
  }
    };

    const pieChart1 = new Chart(
      document.getElementById('pieChart1'),
      configpie1
    );

    const datapie2 = {
      labels: <?php echo json_encode($Family_status) ?>,
      datasets: [{
        label: 'Weekly Sales',
        data: <?php echo json_encode($Count1) ?>,
        backgroundColor: [
          'rgba(255, 200, 0 , 0.4)',
          'rgba(0, 128, 0, 0.4)',
          'rgba(0, 128, 0, 0.5)',
          'rgba(0, 128, 0, 0.6)',
          'rgba(0, 128, 0, 0.7)'
          
        ],
        
      }]
    };
    const configpie2 = {
      type: 'pie',
      data: datapie2,
      options: {   
    plugins: {
      legend: {
        display: true,
        position: 'right'
      }
    }
  }
    };
    
    const pieChart2 = new Chart(
      document.getElementById('pieChart2'),
      configpie2
    );

    const datapie3 = {
      labels: <?php echo json_encode($Education) ?>,
      datasets: [{
        label: 'Weekly Sales',
        data: <?php echo json_encode($Count7) ?>,
        backgroundColor: [
          'rgba(70, 120, 200, 0.9)',
          'rgba(255, 140, 50, 0.9)',
          'rgba(210, 210, 210, 0.9)',
          'rgba(90, 90, 90, 0.9)'
          
        ],
      }]
    };
    const configpie3 = {
      type: 'pie',
      data: datapie3,
      options: {   
    plugins: {
      legend: {
        display: true,
        position: 'right'
      }
    }
  }
    };

    const pieChart3 = new Chart(
      document.getElementById('pieChart3'),
      configpie3
    );

    const datapie4 = {
      labels: <?php echo json_encode($Income_type3) ?>,
      datasets: [{
        label: 'Weekly Sales',
        data: <?php echo json_encode($Count6) ?>,
        backgroundColor: [
          'rgba(0, 128, 0, 0.6)',
          'rgba(0, 128, 0, 0.4)',
          'rgba(255, 140, 50, 0.9)',
          'rgba(255, 190, 50, 0.6)'
          
        ],
      }]
    };
    const configpie4 = {
      type: 'pie',
      data: datapie4,
      options: {   
    plugins: {
      legend: {
        display: true,
        position: 'right'
      }
    }
  }
    };

    const pieChart4 = new Chart(
      document.getElementById('pieChart4'),
      configpie4
    );

    const databar1 = {
      labels: <?php echo json_encode($Income_type1) ?>,
      datasets: [{
        label: 'Income Type',
        data: <?php echo json_encode($Approved) ?>,
        backgroundColor: [
          'rgba(0, 128, 0, 0.8)',
          'rgba(0, 128, 0, 0.6)',
          'rgba(0, 128, 0, 0.4)',
          'rgba(255, 200, 0 , 0.4)'
        ],
  
      }]
    };

    // config 
    const configbar1 = {
      type: 'bar',
      data: databar1,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const barChart1 = new Chart(
      document.getElementById('barChart1'),
      configbar1
    );

    const databar2 = {
      labels: <?php echo json_encode($Income_type2) ?>,
      datasets: [{
        label: 'Income Type',
        data: <?php echo json_encode($Avg_income) ?>,
        backgroundColor: [
          'rgba(0, 128, 0, 0.8)',
          'rgba(0, 128, 0, 0.6)',
          'rgba(0, 128, 0, 0.4)',
          'rgba(255, 200, 0 , 0.7)'
        ],
      }]
    };

    // config 
    const configbar2 = {
      type: 'bar',
      data: databar2,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    const barChart2 = new Chart(
      document.getElementById('barChart2'),
      configbar2
    );

    const datamix1 = {
    labels: <?php echo json_encode($Family_status1) ?>,
    datasets: [{
        type: 'bar',
        label: 'Applied',
        data: <?php echo json_encode($Count4) ?>,
        backgroundColor: [
          'rgba(255, 0, 0, 0.7)',
          'rgba(222, 0, 0, 0.7)',
          'rgba(58, 58, 58, 0.7)',
          'rgba(0, 0, 0 , 0.7)'
        ],
    }, {
        type: 'line',
        label: 'Approved',
        data: <?php echo json_encode($Count3) ?>,
        fill: false,
        borderColor: 'rgb(0, 0, 0)',
    }]
    };

    // config 
    const configmix1 = {
    type: 'scatter',
    data: datamix1,
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    };

    const mixChart1 = new Chart(
      document.getElementById('mixChart1'),
      configmix1
    );
    const databar3 = {
      labels: <?php echo json_encode($House) ?>,
      datasets: [{
        label: 'House',
        data: <?php echo json_encode($Count5) ?>,
        backgroundColor: [
          'rgba(255, 146, 0, 0.8)',
          'rgba(254, 92, 0, 0.8)',
          'rgba(33, 33, 33, 0.8)',
          'rgba(75, 192, 192, 0.8)',
          'rgba(0, 0, 0, 0.8)',
          'rgba(255, 159, 64, 0.8)',
          'rgba(175, 0, 55, 0.8)'
        ],
      }]
    };

    // config 
    const configbar3 = {
      type: 'bar',
      data: databar3,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    const barChart3 = new Chart(
      document.getElementById('barChart3'),
      configbar3
    );
    </script>

  </body>
</html>