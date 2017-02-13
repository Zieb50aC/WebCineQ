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
    public partial class FormUsuarios : Form
    {
        public FormUsuarios()
        {
            InitializeComponent();
        }

        private void toolStripButtonVolver_Click(object sender, EventArgs e)
        {
            FormOpciones fo = new FormOpciones();
            fo.Show();
            this.Hide();
        }
    }
}
