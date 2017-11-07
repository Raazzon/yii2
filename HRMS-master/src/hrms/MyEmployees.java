/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package hrms;

import java.awt.HeadlessException;
import java.awt.Image;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.ImageIcon;
import javax.swing.JOptionPane;
import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;
import javax.xml.bind.DatatypeConverter;

/**
 *
 * @author LORDsajan
 */
public class MyEmployees extends javax.swing.JFrame {

    Connection conn = null;
    PreparedStatement pst = null;
    ResultSet rs = null;
    ImageIcon img;
    String seEmpId;
    String seEmpName;

    /**
     * Creates new form MyEmployees
     */
    public MyEmployees() {

        initComponents();

        searchPan1.setVisible(false);
        tblEmp.addMouseListener(new MouseAdapter() {
            @Override
            public void mouseClicked(MouseEvent e) {
                if (e.getClickCount() == 2) {
                    JTable target = (JTable) e.getSource();
                    int row = target.getSelectedRow();
                    int column = target.getSelectedColumn();
                    String empID = (String) target.getValueAt(row, 0);

                    try {
                        EmployeeForm empf = new EmployeeForm();
                        empf.setVisible(true);
                        SqliteConnect.connectDb();
                        String sql = "SELECT * FROM employee WHERE emp_id='" + empID + "'";
                        pst = SqliteConnect.conn.prepareStatement(sql);
                        rs = pst.executeQuery();
                        int count = 0;
                        while (rs.next()) {
                            count++;
                            empf.UpdateBtn.setEnabled(true);
                            empf.confirmBtn.setVisible(false);
                            empf.depaddLab.setVisible(true);
                            //image
                            byte[] imag = rs.getBytes("photo");
                            ImageIcon newEimg;
                            if (imag != null) {
                                img = new ImageIcon(imag);
                                Image Eimg = img.getImage();
                                Image sEimg = Eimg.getScaledInstance(empf.imageLabel.getWidth(), empf.imageLabel.getHeight(), Image.SCALE_SMOOTH);
                                newEimg = new ImageIcon(sEimg);
                                empf.imageLabel.setIcon(newEimg);
                            } else {
                                empf.imageLabel.setIcon(new javax.swing.ImageIcon("ee.png"));
                            }
                            empf.firstName.setText(rs.getString("first_name"));
                            empf.middleName.setText(rs.getString("middle_name"));
                            empf.lastName.setText(rs.getString("last_name"));
                            empf.firstName.setText(rs.getString("first_name"));
                            empf.middleName.setText(rs.getString("middle_name"));
                            empf.lastName.setText(rs.getString("last_name"));
                            empf.addressinp.setText(rs.getString("address"));
                            empf.emailinp.setText(rs.getString("email"));
                            empf.dobInp.setText(rs.getString("dob"));
                            empf.contcInp.setText(rs.getString("contact_no"));
                            empf.Department.setSelectedItem(rs.getString("department"));
                            System.out.println(rs.getString("department"));
                            String gender = rs.getString("gender");
                            if (gender.equalsIgnoreCase("F")) {
                                empf.F.setSelected(true);
                            } else if (gender.equalsIgnoreCase("Others")) {
                                empf.others.setSelected(true);
                            } else {
                                empf.M.setSelected(true);
                            }

                            String married = rs.getString("Married");
                            if (married.equalsIgnoreCase("yes")) {
                                empf.yess.setSelected(true);
                            } else {
                                empf.noo.setSelected(true);
                            }
                            empf.empId.setText(rs.getString("emp_id"));
                            empf.Designation.setText(rs.getString("designation"));
                            empf.doj.setText(rs.getString("doJoin"));
                            empf.qualifi.setText(rs.getString("qualification"));
                            empf.expInp.setText(rs.getString("yoExp"));
                            empf.workLocation.setText(rs.getString("work_place"));
                            empf.qualifi.setText(rs.getString("qualification"));
                            empf.qualifi.setText(rs.getString("qualification"));
                            empf.post.setSelectedItem(rs.getString("position_type"));
                            empf.mthSalInp.setText(rs.getString("monthlySalary"));
                            empf.yearlyInp.setText(rs.getString("yearlySalary"));
                            empf.deduInp.setText(rs.getString("Deduction"));
                            empf.BonusInp.setText(rs.getString("BonouS"));
                            empf.wageSel.setSelectedItem(rs.getString("wage_type"));
                            empf.NetsalInp.setText(rs.getString("netSalary"));
                            empf.twdInp.setText(rs.getString("totalDays"));
                            empf.halfLeaveinp.setText(rs.getString("halfLeaves"));
                            empf.FullDayinp.setText(rs.getString("fullLeaves"));
                            empf.presentDayInp.setText(rs.getString("totalPresent"));

                        }
                        if (count < 1) {
                            JOptionPane.showMessageDialog(null, "No Results Found");
                        }
                    } catch (HeadlessException | NumberFormatException eq) {
                        JOptionPane.showMessageDialog(null, "Invalid ID");
                    } catch (SQLException ex) {
                        Logger.getLogger(MyEmployees.class.getName()).log(Level.SEVERE, null, ex);
                    }

                }
            }
        });

    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jPanel2 = new javax.swing.JPanel();
        jSeparator3 = new javax.swing.JSeparator();
        nextBtn = new javax.swing.JButton();
        prevBtn1 = new javax.swing.JButton();
        jSeparator4 = new javax.swing.JSeparator();
        jSeparator5 = new javax.swing.JSeparator();
        jSeparator6 = new javax.swing.JSeparator();
        addPanel = new javax.swing.JPanel();
        addLabel = new javax.swing.JLabel();
        searchPanel = new javax.swing.JPanel();
        searchlabel = new javax.swing.JLabel();
        mainPanel2 = new javax.swing.JPanel();
        searchPan1 = new javax.swing.JPanel();
        heading4 = new javax.swing.JPanel();
        addClose = new javax.swing.JLabel();
        headLabel4 = new javax.swing.JLabel();
        txtID1 = new javax.swing.JTextField();
        jSeparator9 = new javax.swing.JSeparator();
        jSeparator10 = new javax.swing.JSeparator();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        searchSub1 = new javax.swing.JButton();
        txtName = new javax.swing.JTextField();
        heading2 = new javax.swing.JPanel();
        refBtn = new javax.swing.JButton();
        headLabel2 = new javax.swing.JLabel();
        jScrollPane3 = new javax.swing.JScrollPane();
        tblEmp = new javax.swing.JTable();
        jSeparator1 = new javax.swing.JSeparator();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Manage Employee");
        setType(java.awt.Window.Type.UTILITY);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowOpened(java.awt.event.WindowEvent evt) {
                formWindowOpened(evt);
            }
        });
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jPanel1.setBackground(new java.awt.Color(51, 51, 51));
        jPanel1.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jPanel2.setBackground(new java.awt.Color(0, 153, 153));
        jPanel2.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jSeparator3.setBackground(new java.awt.Color(51, 255, 255));
        jSeparator3.setForeground(new java.awt.Color(51, 204, 255));
        jSeparator3.setOrientation(javax.swing.SwingConstants.VERTICAL);
        jPanel2.add(jSeparator3, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 0, 10, 40));

        nextBtn.setBackground(new java.awt.Color(0, 102, 102));
        nextBtn.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hrms/images/next2.png"))); // NOI18N
        nextBtn.setBorderPainted(false);
        nextBtn.setEnabled(false);
        nextBtn.setFocusPainted(false);
        nextBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                nextBtnActionPerformed(evt);
            }
        });
        jPanel2.add(nextBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(40, 0, 40, 40));

        prevBtn1.setBackground(new java.awt.Color(0, 102, 102));
        prevBtn1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hrms/images/prev2.png"))); // NOI18N
        prevBtn1.setBorderPainted(false);
        prevBtn1.setFocusPainted(false);
        prevBtn1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                prevBtn1ActionPerformed(evt);
            }
        });
        jPanel2.add(prevBtn1, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 40, 40));

        jPanel1.add(jPanel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 1300, 40));

        jSeparator4.setOrientation(javax.swing.SwingConstants.VERTICAL);
        jPanel1.add(jSeparator4, new org.netbeans.lib.awtextra.AbsoluteConstraints(270, 50, 20, 540));
        jPanel1.add(jSeparator5, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 280, 250, 10));
        jPanel1.add(jSeparator6, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 160, 250, 10));

        addPanel.setBackground(new java.awt.Color(51, 51, 51));
        addPanel.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        addLabel.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        addLabel.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hrms/images/adder.png"))); // NOI18N
        addLabel.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                addLabelMouseClicked(evt);
            }
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                addLabelMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                addLabelMouseExited(evt);
            }
        });
        addPanel.add(addLabel, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 270, 90));

        jPanel1.add(addPanel, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 60, 270, 90));

        searchPanel.setBackground(new java.awt.Color(51, 51, 51));
        searchPanel.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        searchlabel.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        searchlabel.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hrms/images/searcher.png"))); // NOI18N
        searchlabel.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                searchlabelMouseClicked(evt);
            }
            public void mouseEntered(java.awt.event.MouseEvent evt) {
                searchlabelMouseEntered(evt);
            }
            public void mouseExited(java.awt.event.MouseEvent evt) {
                searchlabelMouseExited(evt);
            }
        });
        searchPanel.add(searchlabel, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 270, 90));

        jPanel1.add(searchPanel, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 180, 270, 90));

        mainPanel2.setBackground(new java.awt.Color(149, 183, 221));
        mainPanel2.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        searchPan1.setBackground(new java.awt.Color(51, 51, 51));
        searchPan1.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        heading4.setBackground(new java.awt.Color(0, 102, 102));
        heading4.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        addClose.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        addClose.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hrms/images/close.png"))); // NOI18N
        addClose.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                addCloseMouseClicked(evt);
            }
        });
        heading4.add(addClose, new org.netbeans.lib.awtextra.AbsoluteConstraints(490, 0, 40, 40));

        headLabel4.setFont(new java.awt.Font("Times New Roman", 0, 18)); // NOI18N
        headLabel4.setForeground(new java.awt.Color(255, 255, 255));
        headLabel4.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        headLabel4.setText("Search For");
        heading4.add(headLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 530, 40));

        searchPan1.add(heading4, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 530, 40));

        txtID1.setBackground(new java.awt.Color(51, 51, 51));
        txtID1.setFont(new java.awt.Font("Times New Roman", 1, 18)); // NOI18N
        txtID1.setForeground(new java.awt.Color(255, 255, 255));
        txtID1.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        txtID1.setBorder(null);
        txtID1.setCaretColor(new java.awt.Color(255, 255, 255));
        txtID1.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        txtID1.setOpaque(false);
        searchPan1.add(txtID1, new org.netbeans.lib.awtextra.AbsoluteConstraints(180, 70, 280, 30));

        jSeparator9.setForeground(new java.awt.Color(102, 0, 0));
        searchPan1.add(jSeparator9, new org.netbeans.lib.awtextra.AbsoluteConstraints(180, 100, 280, 10));

        jSeparator10.setForeground(new java.awt.Color(102, 0, 0));
        searchPan1.add(jSeparator10, new org.netbeans.lib.awtextra.AbsoluteConstraints(180, 170, 280, 10));

        jLabel3.setFont(new java.awt.Font("Times New Roman", 1, 14)); // NOI18N
        jLabel3.setForeground(new java.awt.Color(255, 255, 255));
        jLabel3.setText("Employee Name");
        searchPan1.add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(70, 140, 140, 40));

        jLabel4.setFont(new java.awt.Font("Times New Roman", 1, 14)); // NOI18N
        jLabel4.setForeground(new java.awt.Color(255, 255, 255));
        jLabel4.setText("Employee ID");
        searchPan1.add(jLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(70, 70, 140, 40));

        searchSub1.setBackground(new java.awt.Color(0, 204, 204));
        searchSub1.setText("SUBMIT");
        searchSub1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                searchSub1ActionPerformed(evt);
            }
        });
        searchPan1.add(searchSub1, new org.netbeans.lib.awtextra.AbsoluteConstraints(70, 200, 400, 30));

        txtName.setBackground(new java.awt.Color(51, 51, 51));
        txtName.setFont(new java.awt.Font("Times New Roman", 1, 18)); // NOI18N
        txtName.setForeground(new java.awt.Color(255, 255, 255));
        txtName.setHorizontalAlignment(javax.swing.JTextField.CENTER);
        txtName.setBorder(null);
        txtName.setCaretColor(new java.awt.Color(255, 255, 255));
        txtName.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        txtName.setOpaque(false);
        searchPan1.add(txtName, new org.netbeans.lib.awtextra.AbsoluteConstraints(180, 140, 280, 30));

        mainPanel2.add(searchPan1, new org.netbeans.lib.awtextra.AbsoluteConstraints(230, 160, -1, 250));

        heading2.setBackground(new java.awt.Color(0, 102, 102));
        heading2.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        refBtn.setBackground(new java.awt.Color(255, 51, 51));
        refBtn.setIcon(new javax.swing.ImageIcon(getClass().getResource("/hrms/images/refreshicon.png"))); // NOI18N
        refBtn.setToolTipText("Refresh");
        refBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                refBtnActionPerformed(evt);
            }
        });
        heading2.add(refBtn, new org.netbeans.lib.awtextra.AbsoluteConstraints(900, 0, 90, 40));

        headLabel2.setFont(new java.awt.Font("Times New Roman", 0, 18)); // NOI18N
        headLabel2.setForeground(new java.awt.Color(255, 255, 255));
        headLabel2.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        headLabel2.setText("My EMPOYEE");
        heading2.add(headLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 990, 40));

        mainPanel2.add(heading2, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 10, 990, 40));

        tblEmp.setAutoCreateRowSorter(true);
        tblEmp.setBackground(new java.awt.Color(245, 245, 255));
        tblEmp.setBorder(new javax.swing.border.MatteBorder(null));
        tblEmp.setFont(new java.awt.Font("Serif", 1, 14)); // NOI18N
        tblEmp.setForeground(new java.awt.Color(51, 0, 51));
        tblEmp.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {

            },
            new String [] {

            }
        ){
            public boolean isCellEditable(int rowIndex, int columnIndex) {
                return false;

            }
        });
        tblEmp.setToolTipText("Double Click To View");
        tblEmp.setGridColor(new java.awt.Color(204, 204, 255));
        tblEmp.setRowHeight(36);
        tblEmp.setRowMargin(10);
        jScrollPane3.setViewportView(tblEmp);
        if (tblEmp.getColumnModel().getColumnCount() > 0) {
            tblEmp.getColumnModel().getColumn(0).setHeaderValue("ID");
            tblEmp.getColumnModel().getColumn(1).setHeaderValue("Name");
            tblEmp.getColumnModel().getColumn(2).setHeaderValue("Email");
            tblEmp.getColumnModel().getColumn(3).setHeaderValue("Contact");
            tblEmp.getColumnModel().getColumn(4).setHeaderValue("Department");
            tblEmp.getColumnModel().getColumn(5).setHeaderValue("Designation");
            tblEmp.getColumnModel().getColumn(6).setHeaderValue("Start Date");
        }

        mainPanel2.add(jScrollPane3, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 70, 990, 450));
        mainPanel2.add(jSeparator1, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 530, 730, -1));

        jPanel1.add(mainPanel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(280, 50, 1010, -1));

        getContentPane().add(jPanel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 1300, 600));

        pack();
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void nextBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_nextBtnActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_nextBtnActionPerformed

    private void prevBtn1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_prevBtn1ActionPerformed
        Home h = new Home();
        h.setVisible(true);
        this.dispose();
    }//GEN-LAST:event_prevBtn1ActionPerformed

    private void addLabelMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_addLabelMouseEntered
        addPanel.setBackground(new java.awt.Color(102, 102, 102));
    }//GEN-LAST:event_addLabelMouseEntered

    private void addLabelMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_addLabelMouseExited
        addPanel.setBackground(new java.awt.Color(51, 51, 51));
    }//GEN-LAST:event_addLabelMouseExited

    private void formWindowOpened(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowOpened

        DefaultTableModel v = (DefaultTableModel) tblEmp.getModel();

        v.addColumn("          EmployeeID");
        v.addColumn("         Name");
        v.addColumn("          Email");
        v.addColumn("         Contact");
        v.addColumn("          Designation");
        v.addColumn("         Department");
        v.addColumn("          Start Date");
        try {
            SqliteConnect.connectDb();
            String sql = "SELECT * FROM employee WHERE status=1 order by emp_id DESC ";
            pst = SqliteConnect.conn.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                String name = rs.getString("first_name") + " " + rs.getString("last_name");
                v.addRow(new Object[]{
                    "            " + rs.getString("emp_id"),
                    "       " + name,
                    "     " + rs.getString("email"),
                    "        " + rs.getString("contact_no"),
                    "      " + rs.getString("designation"),
                    "         " + rs.getString("department"),
                    "        " + rs.getString("doJoin")
                });
            }
        } catch (SQLException e) {
            System.out.println(e);
            JOptionPane.showMessageDialog(null, e.getMessage());
        }

    }//GEN-LAST:event_formWindowOpened

    private void addLabelMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_addLabelMouseClicked

        EmployeeForm empForm = new EmployeeForm();
        empForm.setVisible(true);
        empForm.UpdateBtn.setVisible(false);
        empForm.empId.setEditable(false);
        try {
            SqliteConnect.connectDb();
            String SQL = "SELECT COUNT(*) AS total FROM employee";
            pst = SqliteConnect.conn.prepareStatement(SQL);
            rs = pst.executeQuery();
            while (rs.next()) {
                int total = rs.getInt(1) + 1;
                String tot = Integer.toString(total);
                empForm.empId.setText(tot);
            }

        } catch (SQLException e) {
        }

    }//GEN-LAST:event_addLabelMouseClicked

    private void refBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_refBtnActionPerformed
        DefaultTableModel t = (DefaultTableModel) tblEmp.getModel();
        int rowCount = t.getRowCount();

        for (int i = rowCount - 1; i >= 0; i--) {
            t.removeRow(i);
        }
        try {
            SqliteConnect.connectDb();
            String sql = "SELECT * FROM employee WHERE status=1 order by emp_id DESC ";
            pst = SqliteConnect.conn.prepareStatement(sql);
            rs = pst.executeQuery();
            while (rs.next()) {
                String name = rs.getString("first_name") + " " + rs.getString("last_name");
                t.addRow(new Object[]{
                    "            " + rs.getString("emp_id"),
                    "       " + name,
                    "     " + rs.getString("email"),
                    "        " + rs.getString("contact_no"),
                    "      " + rs.getString("designation"),
                    "         " + rs.getString("department"),
                    "        " + rs.getString("doJoin")
                });
            }
        } catch (SQLException e) {
            System.out.println(e);
            JOptionPane.showMessageDialog(null, e.getMessage());
        }
    }//GEN-LAST:event_refBtnActionPerformed

    private void searchlabelMouseExited(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_searchlabelMouseExited
        searchPanel.setBackground(new java.awt.Color(51, 51, 51));
    }//GEN-LAST:event_searchlabelMouseExited

    private void searchlabelMouseEntered(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_searchlabelMouseEntered
        searchPanel.setBackground(new java.awt.Color(102, 102, 102));
    }//GEN-LAST:event_searchlabelMouseEntered

    private void searchlabelMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_searchlabelMouseClicked
        searchPan1.setVisible(true);
        tblEmp.setEnabled(false);
    }//GEN-LAST:event_searchlabelMouseClicked

    private void searchSub1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_searchSub1ActionPerformed
        String empID = txtID1.getText();
        String firstName = txtName.getText();
        if (empID.equals("") && firstName.equals("")) {
            JOptionPane.showMessageDialog(null, "Both Field Cant be Empty");
        } else {
            DefaultTableModel t = (DefaultTableModel) tblEmp.getModel();
            tblEmp.setEnabled(true);
            int rowCount = t.getRowCount();

            for (int i = rowCount - 1; i >= 0; i--) {
                t.removeRow(i);
            }
            try {
                SqliteConnect.connectDb();
                String sql = "SELECT * FROM employee WHERE first_name='" + firstName + "' OR emp_id='" + empID + "' order by emp_id DESC ";
                pst = SqliteConnect.conn.prepareStatement(sql);
                rs = pst.executeQuery();
                while (rs.next()) {
                    String name = rs.getString("first_name") + " " + rs.getString("last_name");
                    t.addRow(new Object[]{
                        "            " + rs.getString("emp_id"),
                        "       " + name,
                        "     " + rs.getString("email"),
                        "        " + rs.getString("contact_no"),
                        "      " + rs.getString("designation"),
                        "         " + rs.getString("department"),
                        "        " + rs.getString("doJoin")
                    });
                }
            } catch (SQLException e) {
                System.out.println(e);
                JOptionPane.showMessageDialog(null, e.getMessage());
            }
            searchPan1.setVisible(false);
        }
    }//GEN-LAST:event_searchSub1ActionPerformed

    private void addCloseMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_addCloseMouseClicked
        MyEmployees emps = new MyEmployees();
        searchPan1.setVisible(false);
        tblEmp.setEnabled(true);
        emps.setVisible(true);
    }//GEN-LAST:event_addCloseMouseClicked

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException | InstantiationException | IllegalAccessException | javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(MyEmployees.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new MyEmployees().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel addClose;
    private javax.swing.JLabel addLabel;
    private javax.swing.JPanel addPanel;
    private javax.swing.JLabel headLabel2;
    private javax.swing.JLabel headLabel4;
    private javax.swing.JPanel heading2;
    private javax.swing.JPanel heading4;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JScrollPane jScrollPane3;
    private javax.swing.JSeparator jSeparator1;
    private javax.swing.JSeparator jSeparator10;
    private javax.swing.JSeparator jSeparator3;
    private javax.swing.JSeparator jSeparator4;
    private javax.swing.JSeparator jSeparator5;
    private javax.swing.JSeparator jSeparator6;
    private javax.swing.JSeparator jSeparator9;
    private javax.swing.JPanel mainPanel2;
    private javax.swing.JButton nextBtn;
    private javax.swing.JButton prevBtn1;
    protected javax.swing.JButton refBtn;
    private javax.swing.JPanel searchPan1;
    private javax.swing.JPanel searchPanel;
    private javax.swing.JButton searchSub1;
    private javax.swing.JLabel searchlabel;
    protected javax.swing.JTable tblEmp;
    public javax.swing.JTextField txtID1;
    public javax.swing.JTextField txtName;
    // End of variables declaration//GEN-END:variables

}
