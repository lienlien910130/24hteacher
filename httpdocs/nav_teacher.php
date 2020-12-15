<div class="col-lg-12" style="margin-top:10px;font-size: 20px">

    <ul id="tree1" style="font-size: 20px">
                <li style="border: 2px solid #20B2AA;margin-bottom: 10px;padding: 10px 0 10px 10px;border-radius: 10px">
                    <a href="#">上課對象</a>
                    <ul>
                        <a href="#" onclick="addtexts(1,1)"><li>學齡前兒童</li></a>
                        <a href="#" onclick="addtexts(1,2)"><li>國小生</li></a>
                        <a href="#" onclick="addtexts(1,3)"><li>國中生</li></a>
                        <a href="#" onclick="addtexts(1,4)"><li>高中生</li></a>
                        <a href="#" onclick="addtexts(1,5)"><li>大學生</li></a>
                        <a href="#" onclick="addtexts(1,6)"><li>社會人士</li></a>
                    </ul>
                </li>
                <li style="border: 2px solid #20B2AA;margin-bottom: 10px;padding: 10px 0 10px 10px;border-radius: 10px"><a href="#">上課科目</a>
                    <ul>
                        <?php 
                        @session_start();
                        include_once 'lib/core.php';
                        $sql = "SELECT  * FROM subjects";
                        $pdo = DB_CONNECT();
                        $rs = $pdo ->query($sql);
                        foreach ($rs as $key => $row) {
                        ?>
                        <li><?php echo $row["val"]?>
                        
                        <?php
                        $sql1 = "SELECT * FROM lessions WHERE sid =".$row["id"];
                        $rs1 = $pdo ->query($sql1);
                        foreach ($rs1 as $key => $row1) {
                            ?>
                            <ul>
                                <a href="#" onclick="addtexts(2,<?php echo $row1["id"]?>)"><li><?php echo $row1["val"]?></li></a>
                                </ul>
                            <?php
                          }
                        }
                        ?>
                        
                        </li>
                        
                    </ul>
                </li>
                <li style="border: 2px solid #20B2AA;margin-bottom: 10px;padding: 10px 0 10px 10px;border-radius: 10px"><a href="#">上課地點</a>
                    <ul>
                        <?php 
                        @session_start();
                        include_once 'lib/core.php';
                        $sql = "SELECT  * FROM city";
                        $pdo = DB_CONNECT();
                        $rs = $pdo ->query($sql);
                        foreach ($rs as $key => $row) {
                        ?>
                        <li><?php echo $row["cityvalue"]?>
                        
                        <?php
                        $sql1 = "SELECT * FROM area WHERE cid =".$row["id"];
                        $rs1 = $pdo ->query($sql1);
                        foreach ($rs1 as $key => $row1) {
                            ?>
                            <ul>
                                <a href="#" onclick="addtexts(3,<?php echo $row1["id"]?>)"><li><?php echo $row1["value"]?></li></a>
                                </ul>
                            <?php
                          }
                        }
                        ?>
                        </li>
                    </ul>
                </li>
                 <li style="border: 2px solid #20B2AA;margin-bottom: 10px;padding: 10px 0 10px 10px;border-radius: 10px"><a href="#">教學經驗</a>
                    <ul>
                        <a href="#" onclick="addtexts(4,1)"><li>無經驗</li></a>
                        <a href="#" onclick="addtexts(4,2)"><li>一年以下</li></a>
                        <a href="#" onclick="addtexts(4,3)"><li>一年以上~三年以下</li></a>
                        <a href="#" onclick="addtexts(4,4)"><li>三年以上~五年以下</li></a>
                        <a href="#" onclick="addtexts(4,5)"><li>五年以上</li></a>
                    </ul>
                </li>
                <li style="border: 2px solid #20B2AA;margin-bottom: 10px;padding: 10px 0 10px 10px;border-radius: 10px"><a href="#">時薪範圍</a>
                    <ul>
                        <a href="#" onclick="addtexts(5,1)"><li>0~200</li></a>
                        <a href="#" onclick="addtexts(5,2)"><li>201~500</li></a>
                        <a href="#" onclick="addtexts(5,3)"><li>501~800</li></a>
                        <a href="#" onclick="addtexts(5,4)"><li>801~1000</li></a>
                        <a href="#" onclick="addtexts(5,5)"><li>1001以上</li></a>
                    </ul>
                </li>
                <li style="border: 2px solid #20B2AA;margin-bottom: 10px;padding: 10px 0 10px 10px;border-radius: 10px;border-radius: 10px"><a href="#">老師身份</a>
                      <ul>
                        <a href="#" onclick="addtexts(6,2)"><li>在校生</li></a>
                        <a href="#" onclick="addtexts(6,3)"><li>上班族</li></a>
                        <a href="#" onclick="addtexts(6,4)"><li>教師</li></a>
                        <a href="#" onclick="addtexts(6,5)"><li>補習班老師/家教</li></a>
                    </ul>
                </li>

            </ul>
</div>
<link rel="stylesheet" type="text/css" href="nav.css">

<script type="text/javascript">
    $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

$('#tree1').treed();
$('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});
$('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});

 
</script>