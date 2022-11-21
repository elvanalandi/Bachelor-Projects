/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Thread;

import javax.swing.JTextField;

/**
 *
 * @author SI
 */
public class Random extends Thread{
        private JTextField text;
        int num = (int) (Math.random()*10);
        
        public boolean stopped = false;
    
        public void process(){
                if(!stopped){
                    text.setText(Integer.toString(num));
                    num = (int) (Math.random()*10);
                }
        }

    public JTextField getText() {
        return text;
    }
    
    public void setText(JTextField text) {
        this.text = text;
    }

    public int getNum() {
        return num;
    }

    public void setNum(int num) {
        this.num = num;
    }
    
        @Override
        public void run()
        {
            try{
                while(true)
                {
                    process();
                    Thread.sleep(250);
                }
            }
            catch (InterruptedException e){

            }
        }
}
