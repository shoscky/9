<?
    /* ============================================================================== */
    /* =   PAGE : ���� ��û PAGE                                                    = */
    /* = -------------------------------------------------------------------------- = */
    /* =   �Ʒ��� �� ���� �� �κ��� �� �����Ͻÿ� ������ �����Ͻñ� �ٶ��ϴ�.       = */
    /* = -------------------------------------------------------------------------- = */
    /* =   ������ ������ �߻��ϴ� ��� �Ʒ��� �ּҷ� �����ϼż� Ȯ���Ͻñ� �ٶ��ϴ�.= */
    /* =   ���� �ּ� : http://kcp.co.kr/technique.requestcode.do			        = */
    /* = -------------------------------------------------------------------------- = */
    /* =   Copyright (c)  2013   KCP Inc.   All Rights Reserverd.                   = */
    /* ============================================================================== */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>*** KCP [AX-HUB Version] ***</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
    <link href="css/style.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript">
    function  jsf__go_mod( form )
    {
        var RetVal = false ;
        if ( form.tno.value.length < 14 )
        {
            alert( "KCP �ŷ� ��ȣ�� �Է��ϼ���" );
            form.tno.focus();
            form.tno.select();
        }
        else
        {
            openwin = window.open( "proc_win.html", "proc_win", "width=449, height=209, top=300, left=300" );
            RetVal = true ;
        }

        return RetVal ;
    }
    </script>
</head>

<body>

    <div id="sample_wrap">
<?
    /* ============================================================================== */
    /* =   1. ���� ��û ���� �Է� ��(modify_info)                                   = */
    /* = -------------------------------------------------------------------------- = */
    /* =   ���� ��û�� �ʿ��� ������ �����մϴ�.                                    = */
    /* = -------------------------------------------------------------------------- = */
?>
    <form name="modify_info" method="post" action="pp_ax_hub.php">

                 <!-- Ÿ��Ʋ Start-->
                    <h1>[���Կ�û] <span>�� �������� �����ǿ� ���� ������ ��û�ϴ� ����(����) �������Դϴ�.</span></h1>
                 <!-- Ÿ��Ʋ End -->

                    <!-- ��� ���̺� Start -->
                    <div class="sample">
                    <p>
                        �ҽ� ���� �� �ҽ� �ȿ� <span>�� ���� ��</span> ǥ�ð� ���Ե� ������ �������� ��Ȳ�� �°� ������ ���� <br/>
                        �����Ͻñ� �ٶ��ϴ�.<br/>
                        �� �������� ������ �ǿ� ���� ������ ��û�ϴ� ������ �Դϴ�. <br/>
                        <span>�� �������� KCP�� �������� ���������� ��ϵ� ��쿡�� ����մϴ�.<br/>
                        �������� �������� ��쿡�� ����Ͻñ� �ٶ��ϴ�.</span><br/>
                        ������ ���εǸ� ��������� KCP �ŷ���ȣ(tno)���� ������ �� �ֽ��ϴ�.<br/>
                        ������������ �� KCP �ŷ���ȣ(tno)������ ���Կ�û�� �Ͻ� �� �ֽ��ϴ�.
                    </p>
                    <!-- ��� ���̺� End -->

                <!-- ���� ��û ���� �Է� ���̺� Start -->
                    <h2>&sdot; �� �� �� û</h2>
                    <table class="tbl" cellpadding="0" cellspacing="0">
                    <!-- ��û ���� : ���� -->
                    <tr>
                        <th>��û ����</th>
                        <td>���� ��û</td>
                    </tr>
                    <!-- Input : ������ ���� �ŷ���ȣ(14 byte) �Է� -->
                    <tr>
                        <th>KCP �ŷ���ȣ</th>
                        <td><input type="text" name="tno" value=""  class="frminput" maxlength="14"/></td>
                    </tr>
                </table>
                <!-- ���� ��û ���� �Է� ���̺� End -->

                    <!-- ���� ��ư ���̺� Start -->
                    <div class="btnset">
                    <input name="" type="submit" class="submit" value="���Կ�û" onclick="return jsf__go_mod(this.form);"/>
                    <a href="../index.html" class="home">ó������</a>
                    </div>
                    <!-- ���� ��ư ���̺� End -->
                </div>
            <div class="footer">
                Copyright (c) KCP INC. All Rights reserved.
            </div>

<?
    /* ============================================================================== */
    /* =   1-1. ���� ��û �ʼ� ���� ����                                            = */
    /* = -------------------------------------------------------------------------- = */
    /* =   �� �ʼ� - �ݵ�� �ʿ��� �����Դϴ�.                                      = */
    /* = -------------------------------------------------------------------------- = */
?>
        <input type="hidden" name="req_tx"   value="mod"  />
        <input type="hidden" name="mod_type" value="STMR" />
    </form>
<?
    /* = -------------------------------------------------------------------------- = */
    /* =   1. ���� ��û ���� END                                                    = */
    /* ============================================================================== */
?>
</div>
</body>
</html>