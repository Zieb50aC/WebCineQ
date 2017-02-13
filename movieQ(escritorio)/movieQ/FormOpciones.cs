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
    public partial class FormOpciones : Form
    {
        public FormOpciones()
        {
            InitializeComponent();
        }
        public FormOpciones(String usuario)
        {
            InitializeComponent();
            toolStripLabelBienvenido.Text= "Bienvenido " + usuario;
        }

        private void FormOpciones_Load(object sender, EventArgs e)
        {
            //labelUsuario.Text = labelUsuario.Text + usuario
        }

   

        private void buttonGestionUsuarios_Click(object sender, EventArgs e)
        {
            FormUsuarios f = new FormUsuarios();
            f.Show();
            this.Hide();
        }

        private void buttonGestionPreguntas_Click(object sender, EventArgs e)
        {
            FormPreguntas fp = new FormPreguntas();
            fp.Show();
            this.Hide();
        }

        private void toolStripButtonCerrarSesion_Click(object sender, EventArgs e)
        {
            Form1 f = new Form1();
            f.Show();
            this.Hide();
        }
    }
}
