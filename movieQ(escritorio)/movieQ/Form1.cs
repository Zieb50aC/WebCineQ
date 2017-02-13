using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace movieQ
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void buttonIniciarSesion_Click(object sender, EventArgs e)
        {
            if(textBoxContraseña.Text.Equals(""))
            {
                MessageBox.Show("La contraseña no puede estar vacía");
            }
            else if(textBoxUsuario.Text.Equals(""))
            {
                MessageBox.Show("El usuario no puede estar vacío");
            }
            else
            {
                //comprobar usuario base de datos
                FormOpciones f = new FormOpciones(textBoxUsuario.Text);
                f.Show();
                this.Hide();
            }
        }
    }
}
