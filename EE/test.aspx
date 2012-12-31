<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Odemegir.aspx.cs" Inherits="Operasyon" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
<link href="Veripark.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">

    debugger
        function CheckOtherIsCheckedByGVID(rb) {
            var isChecked = rb.checked;
            var row = rb.parentNode.parentNode;
           
                if (isChecked) {
                    //row.style.backgroundColor = '#B6C4DE';
                    row.style.backgroundColor = 'BLUE';
                    row.style.color = 'BLACK';
                    document.getElementById("hidAcrobat").value = "";

                    for (i = 1; i < 11; i++) {
                        document.getElementById("hidAcrobat").value += row.cells[i].innerHTML + ";";

                    }
                }
           
           
                var currentRdbID = rb.id;
                var parent = document.getElementById("GridView1");
                var items = parent.getElementsByTagName("input");

                for (i = 0; i < items.length; i++) {
                    if (items[i].id != currentRdbID && items[i].type == "radio") {
                        if (items[i].checked) {
                            items[i].checked = false;
                            items[i].parentNode.parentNode.style.backgroundColor = 'white';
                            items[i].parentNode.parentNode.style.color = '#696969';
                        }
                    }
                }
            }
      
        function makesureoneitemselected(sender, args) {

            var gv = document.getElementById("GridView1");
            var items = gv.getElementsByTagName("input");
            for (var i = 0, c = 0; i < items.length; i++) 
            {
                if (items[i].type == "radio") 
                {
                    if (items[i].checked) 
                    {
                        c=c+1;
                        if (c == 1) 
                        {
                            args.IsValid = true;
                        }
                        else 
                        {
                            args.IsValid = false;
                            return;
                        }
                    }
                }
            }
        }

        function ValidateRadioButton(sender, args) {
            var gv = document.getElementById("<%= GridView1.ClientID %>");
            var items = gv.getElementsByTagName("input");
            for (var i = 0; i < items.length; i++) {
                if (items[i].type == "radio") {
                    if (items[i].checked) {
                        args.IsValid = true;
                        return;
                    }
                    else {
                        args.IsValid = false;
                    }
                }
            }
        }
    </script>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
    <table>
    <tr><td colspan="3">
        <asp:Label ID="Label12" runat="server" CssClass="baslik" 
            Text="Hasta Bilgi Güncelleme"></asp:Label>
        </td></tr>
    <tr>
    <td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr>
    <td colspan="2"><asp:Label ID="Label1" runat="server" Text="Hasta Adi:" 
            CssClass="etiket"></asp:Label></td>
    <td> 
        &nbsp;</td>
    
    </tr>
    <tr><td colspan="2"/>
        <asp:DropDownList ID="DropDownList2" runat="server" 
            DataValueField="hasta_id"
            DataTextField="hasta_adi"
            onselectedindexchanged="DropDownList2_SelectedIndexChanged" 
            AutoPostBack="True">
        </asp:DropDownList>
        <td>
            &nbsp;</td></tr>
    <tr><td colspan="2"/>
        &nbsp;<td>
            &nbsp;</td></tr>
    <tr><td colspan="3">
        <asp:Label ID="Label13" runat="server" Text="Bilgiler:" 
            CssClass="etiket"></asp:Label></td></tr>
    <tr><td colspan="3"/>
        <asp:GridView ID="GridView1" runat="server" Height="104px" Width="146px" 
            onselectedindexchanged="GridView1_SelectedIndexChanged">
            <Columns>
                <asp:TemplateField HeaderText="Secim" ShowHeader="False">
                    <ItemTemplate>
                        <asp:RadioButton ID="RadioButton2" runat="server" 
                            AutoPostBack="False" onclick="javascript:CheckOtherIsCheckedByGVID(this);" 
                            GroupName="gr1"/>
                    </ItemTemplate>
                </asp:TemplateField>
            </Columns>
        </asp:GridView>
       
        <asp:CustomValidator ID="CustomValidator1" runat="server" 
            ClientValidationFunction=" ValidateRadioButton" Display="None" 
            ErrorMessage="Lutfen bir kayit seciniz !!" ForeColor="Red"></asp:CustomValidator>
        <asp:CustomValidator ID="CustomValidator2" runat="server" Display="None" 
            ErrorMessage="Bir tane kayit seciniz !!" ForeColor="Red" 
            ClientValidationFunction="makesureoneitemselected"></asp:CustomValidator>
            
        </tr>
         
    <tr><td>&nbsp;</td><td></td><td>
        &nbsp;</td></tr>
  <tr>
  
  <td>
      <asp:Label ID="Label15" runat="server" CssClass="etiket" Text="Odeme Miktari:"></asp:Label>
      </td>
  <td></td>
  <td>
        &nbsp;</td>
  
  </tr>
  
      <tr>
    <td colspan="3"/>
        <asp:TextBox ID="TextBox1" runat="server" Width="80px"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
            ControlToValidate="TextBox1" Display="None" 
            ErrorMessage="Odeme Miktarini Giriniz !!" ForeColor="Red"></asp:RequiredFieldValidator>
          </tr>
          <tr>
          <td>
              <asp:Label ID="Label16" runat="server" CssClass="etiket" Text="Aciklama:"></asp:Label>
              </td><td></td><td>
              &nbsp;</td>
          </tr>
          <tr>
          <td>
              <asp:TextBox ID="TextBox2" runat="server" Height="79px" Width="192px"></asp:TextBox>
              </td><td>
                  <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                      ControlToValidate="TextBox2" Display="None" ErrorMessage="Aciklama Giriniz !!" 
                      ForeColor="Red"></asp:RequiredFieldValidator>
              </td><td>
                  &nbsp;</td>
          </tr>
          <tr>
          <td>
              <asp:ValidationSummary ID="ValidationSummary1" runat="server" ForeColor="Red" />
              </td><td>&nbsp;</td><td>
              &nbsp;</td>
          </tr>
          <tr>
          <td>
        <asp:Label ID="Label11" runat="server" Font-Bold="True" ForeColor="Red"></asp:Label>
              </td><td>&nbsp;</td><td>
              &nbsp;</td>
          </tr>
          <tr>
          <td>
              <asp:Button ID="Button1" runat="server" CssClass="etiket" Text="Kaydet" 
                  onclick="Button1_Click" />
        <asp:Button ID="Button2" runat="server" CausesValidation="False" 
            CssClass="etiket" onclick="Button2_Click" Text="Ana Menu" />
              </td><td>&nbsp;</td><td>
              &nbsp;</td>
          </tr>
          <tr>
          <td>&nbsp;</td><td>&nbsp;</td><td>
              &nbsp;</td>
          </tr>
          <tr>
          <td>
       <asp:Label ID="Label10" runat="server" Font-Bold="True" ForeColor="Lime"></asp:Label>
              </td><td>&nbsp;</td><td>
              &nbsp;</td>
          </tr>
    </table>
    <input type="hidden" runat="server" id="hidAcrobat"/>
    </div>
    </form>
</body>
</html>