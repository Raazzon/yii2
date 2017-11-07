/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package hrms;

import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.UnsupportedLookAndFeelException;

/**
 *
 * @author LORDsajan
 */
public class HRMS {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
                loading obj = new loading();
                obj.setVisible(true);
                for (int i = 0; i <= 100; i = i + 3) {
                    Thread.sleep(50);
                    obj.lblNum.setText(Integer.toString(i) + "%");
                    obj.lblPro.setValue(i);
                    if (i == 0) {
                        obj.lblTxt.setText("Gathering Resources");
                    }
                    if (i == 30) {
                        obj.lblTxt.setText("Loading Database");
                    }
                    if (i == 60) {
                        obj.lblTxt.setText("Fetching Data");
                    }
                    if (i == 78) {
                        obj.lblTxt.setText("Starting Application");
                    }
                    if (i == 99) {
                        LogIn l = new LogIn();
                        l.setVisible(true);
                        obj.dispose();
                    }

                }

            }
        } catch (ClassNotFoundException | IllegalAccessException | InstantiationException | UnsupportedLookAndFeelException e) {

        } catch (InterruptedException ex) {
            Logger.getLogger(HRMS.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

}
